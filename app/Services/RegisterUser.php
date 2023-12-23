<?php

namespace App\Services;

use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterUser {


    public function viewCheckout(){

        $carts = \Cart::content();
        if(count($carts) > 0){
        return view('users.guest')->with('carts', $carts);
        }else{
            return redirect()->intended(route('users.index'));
        }

    }

    public function UserRegister($request){
        $pass = GenerateRef(10);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => hash::make($pass),
        ];
        User::create($data);
        $user = User::latest()->first();
        Auth::loginUsingId($user->id);
        sleep(1);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['user_id'] = $user->id;
        $data['is_default'] = 1;
        $data['name'] = $user->first_name.''.$user->last_name;
       $ship = ShippingAddress::create($data);
       Mail::to($data['email'])->send(new RegMail($data));
        return $ship;
    }

}