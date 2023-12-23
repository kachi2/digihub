<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Mail\RegMail;
use App\Models\Order;
use App\Mail\paymentMail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $req)
    {
        $data = array(
            "amount" => $req->amount * 100,
            "reference" => GenerateRef(20),
            "email" => auth_user()->email,
            "currency" => "NGN",
            "orderID" => $req->orderNo,
            "metadata" => $req->orderNo
        );

        $orderCheck = Order::where(['user_id' => auth_user()->id, 'order_no' =>$req->orderNo])->first();
        if(!$orderCheck || empty($orderCheck)){
        Order::create([
            'user_id' => auth_user()->id,
            'order_no' => $req->orderNo,
            'payable' => $req->amount,
            'payment_ref' => null,
            'payment_method' => 'Card Payment',
            'address_id' => $req->address_id,
            'is_paid' => 0,
            'is_delivered' => 0,
            'dispatch_status' => 0,
            'shipping_method' => $req->delivery,
        ]);

        $addrs = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
    }
        try {
        Mail::to(auth_user()->email)->send( new RegMail([
            'order_items' => \Cart::content(),
            'name' => $addrs->name,
            'order_no' => $req->orderNo,
            'shipping_cost' => $req->shipping_cost,
            'amount' => $req->amount,
            'email' => $addrs->email,
            'phone' => $addrs->phone,
        ]));
       
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if ($paymentDetails['status'] == true) {
  
            $orders = Order::where('order_no', $paymentDetails['data']['metadata'])->first();
            $orders->update([
                'payment_ref'=> $paymentDetails['data']['reference'],
                'is_paid' => 1,
            ]);
            $ref = GenerateRef(10);
            Payment::create([
                'user_id' => auth_user()->id, 
                'order_id' => $paymentDetails['data']['metadata'], 
                'payment_ref' => $ref, 
                'external_ref' => $paymentDetails['data']['reference'], 
                'status' => 1, 
                'payable' => $paymentDetails['data']['amount']
            ]);
            if($orders->shipping_method == 'home_delivery'){
           event(new OrderShipment($address, $paymentDetails['data']['metadata']));
            }
           Mail::to(auth_user()->email)->send(new paymentMail([
            'amount' => $paymentDetails['data']['amount'],
            'order_No' => $paymentDetails['data']['metadata'],
            'payment_ref' => $ref,
            'external_ref' => $paymentDetails['data']['reference'],
           ]));
        \Cart::destroy();
            return redirect(route('users.index'));
        }else{
            return Redirect::back()->withMessage(['msg' => 'An Error occured processing your payment.', 'type' => 'error']);
        }
    }
}
