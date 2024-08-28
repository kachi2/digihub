<?php 
namespace App\Services;

use App\Mail\paymentMail;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

class Funcs 
{
    public function createPaymentReport($order_no,$amount, $external_ref, $ref)
{
    Payment::create([
        'user_id' => auth_user()->id, 
        'order_id' => $order_no, 
        'payment_ref' => $ref, 
        'external_ref' => $external_ref, 
        'status' => 1, 
        'payable' => $amount
    ]);

}

public function SendOrderMail($order_no,$amount, $ref,$external_ref)
{
    Mail::to(auth_user()->email)->send(new paymentMail([
        'amount' => $amount,
        'order_No' => $order_no,
        'payment_ref' => $ref,
        'external_ref' => $external_ref,
       ]));
}

public function createOrder($req)
{
    Order::create([
        'user_id' => auth_user()->id,
        'order_no' => $req->orderNo,
        'payable' => $req->amount,
        'payment_ref' => null,
        'payment_method' => $req->paymentMethod,
        'is_paid' => 0,
        'is_delivered' => 0,
        'dispatch_status' => 0,
    ]);
}
}