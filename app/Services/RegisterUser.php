<?php

namespace App\Services;

use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class RegisterUser {


    public function viewCheckout(){

        $carts = Cart::content();
        if(count($carts) > 0){
        return view('users.guest')->with('carts', $carts);
        }else{
            return redirect()->intended(route('users.index'));
        }

    }

    public function UserRegister($request){
        $pass = GenerateRef(10);
        $datas = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => hash::make($pass),
        ];
        $user = User::create($datas);
        Auth::loginUsingId($user->id);
       $datas['password'] =  $pass;
       Mail::to($request->email)->send(new RegMail($datas));
        return $datas;
    }

}