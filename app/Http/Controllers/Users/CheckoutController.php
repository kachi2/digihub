<?php

namespace App\Http\Controllers\Users;

use App\Events\CartItemsEvent;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\ShipmentLocation;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Services\RegisterUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use App\Traits\CalculateShipping;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    use CalculateShipping;
 
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Index($cartSession = null){
        if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
        }

        if(count(\Cart::content()) <= 0 || empty(\Cart::content())){
            return redirect()->intended(route('users.index'));
        }
        $carts = \Cart::content();
        $orderNo = rand(111111111,999999999);

        $cart = Hashids::connection('products')->decode($cartSession);
        $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart])->first();
        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        } 
        return view('users.carts.checkout')
        ->with('carts', $carts)
        ->with('orderNo', $orderNo);
    }

    public function RegisterUser(Request $request){

        $valid = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);
        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Some fields are missing');
            return back()->withInput($request->all())->withErrors($valid);
        }
        $userck = User::where('email', $request->email)->exists();
        if($userck){
            Session::flash('alert', 'error');
            Session::flash('msg', 'This email address is already taken, please login to continue');
            return back()->withInput($request->all());
        }
        $register = new RegisterUser;
       $reg = $register->UserRegister($request);
    
        if($reg){
            return redirect()->intended(route('checkout.index'));
        }
       
        Session::flash('alert', 'error');
        Session::flash('msg', 'Something went wrong with your request');
        return back();
    }

}
