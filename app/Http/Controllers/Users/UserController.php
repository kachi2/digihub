<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\CreateShipment;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function Index()
    {
        return view('users.accounts.account')
            ->with('account', User::where('id', auth_user()->id)->first());
    }

    public function AccountSettings()
    {
        return view('users.accounts.settings')
            ->with('user', User::where('id', auth_user()->id)->first());
    }

    public function UpdateAccountSettings(Request $req)
    {
        $user = User::whereId(auth_user()->id)->first();

        if(isset($req->first_name)){
            $data['first_name'] = $req->first_name;
        }
        if(isset($req->last_name)){
            $data['last_name'] = $req->last_name;
        }
        if(isset($req->email)){
            $data['email'] = $req->email;
        }
        if(isset($req->phone)){
            $data['phone'] = $req->phone;
        }
        if(isset($req->password)){
            if(Hash::check($req->oldpassword , auth_user()->password)){
                $data['password'] = Hash::make($req->password);
            }else{
                Session::flash('alert', 'error');
                Session::flash('msg', 'Old password is incorrect');
                return back();
            }
        }if(isset($req->city)){
            $data['city'] = $req->city;
        }
        if(isset($req->state)){
            $data['state'] = $req->state;
        }
        if(isset($req->country)){
            $data['country'] = $req->country;
        }

      $user->fill($data)->save();
      Session::flash('alert', 'success');
      Session::flash('msg', 'Account Updated successfully');
      return back();
    }
}
