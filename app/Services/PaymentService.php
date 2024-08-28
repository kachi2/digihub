<?php

namespace App\Services;

use App\Mail\paymentMail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Payment;
use App\Services\Funcs;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentService extends Funcs
{
    protected $paystack;
    protected $stripe;


    public function __construct()
    {
        $this->stripe = Stripe::setApiKey('sk_test_51P7LhqRxBSKsFyqbRwW3yHYcBxVldQori1jhWvT2yS8VtNSloJWAlI4bB2Yyqwh1ywjJeU6oMWUkAxSMKbldViKb00SP28Wht2');
    }
    public function InitiatePayment($request)
    {
        if ($request->payment_method == 'paystack') return $this->initiatePaystackCheckout($request);
        if ($request->payment_method == 'stripe')  return $this->initiateStripeCheckout($request);
    }

    public function initiatePaystackCheckout($req)
    {
        $data = array(
            "amount" => $req->amount * 100,
            "reference" => GenerateRef(20),
            "email" => auth_user()->email,
            "currency" => $req->currency,
            "order_id" => $req->orderNo,
            "metadata" => $req->orderNo,
            "payment_method" => $req->payment_method
        );
        Parent::createOrder($req);
        Session::put('order_No', $req->orderNo);
        Session::get('amount',$req->amount);
        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function ProcessPaystackPayment()
    {
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['status'] == true) {
            $orderNo = Session::get('order_No');
            $amount = Session::get('amount');
            $cartItems = CartItem::where('order_no', $orderNo)->first();
     
          $option = [
            'public_ids' => $cartItems->productResource->public_id,
            'expires_at' => strtotime(Carbon::now()->addDays(31)), 
        ];
            $image =  cloudinary()->createZip($option);
            $updateOrder = Order::where('Order_No', $orderNo)->first();
            $updateOrder->update([
                'payment_ref' => $paymentDetails['data']['reference'],
                'is_paid' => 1,
                'payment_method' => 'Paystack',
                'resources' => $image['secure_url'],
                'is_delivered' => 1,
            ]);
            $ref = GenerateRef(10);
            Parent::createPaymentReport($orderNo, $amount, $ref, $paymentDetails['data']['reference']);
            Parent::SendOrderMail($orderNo, $amount, $ref,$paymentDetails['data']['reference']);
            Cart::destroy();
            return $paymentDetails;
        } else {
            return false;
        }
    }

    public function initiateStripeCheckout($request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51P7LhqRxBSKsFyqbRwW3yHYcBxVldQori1jhWvT2yS8VtNSloJWAlI4bB2Yyqwh1ywjJeU6oMWUkAxSMKbldViKb00SP28Wht2');

      
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'customer_creation' => 'always',
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => $request->currency ?? 'NGN',
                        'product_data' => [
                            "name" => auth()->user()->email,
                        ],
                        'unit_amount'  =>  $request->amount * 100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'saved_payment_method_options' => ['payment_method_save' => 'enabled'],
            'mode'        => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url'  => route('payment.cancel'),
        ]);
        Parent::createOrder($request);
        Session::put('session_id', $session->id);
        Session::put('order_No', $request->orderNo);
        Session::put('amount', $request->amount);
        return redirect()->away($session->url);
    }


    public function handlePaymentSuccess()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51P7LhqRxBSKsFyqbRwW3yHYcBxVldQori1jhWvT2yS8VtNSloJWAlI4bB2Yyqwh1ywjJeU6oMWUkAxSMKbldViKb00SP28Wht2');
        $session = $stripe->checkout->sessions->retrieve(Session::get('session_id'));
        $intent =  \Stripe\PaymentIntent::all(['limit' => 10, 'customer' => $session['customer']]);
        $payment = $stripe->paymentMethods->retrieve($intent['data']['0']['payment_method'], []);
        $orderNo = Session::get('order_No');
        $amount = Session::get('amount');
        $cartItems = CartItem::where('order_no', $orderNo)->first();
     
        $option = [
            'public_ids' => $cartItems->productResource->public_id,
            'expires_at' => strtotime(Carbon::now()->addDays(31)), 
        ];
        $image =  cloudinary()->createZip($option);
        if ($session->status == 'complete') {
            $updateOrder = Order::where('Order_No', $orderNo)->first();
            $updateOrder->update([
                'payment_ref' => $session->payment_intent,
                'is_paid' => 1,
                'payment_method' => 'Stripe',
                'resources' => $image['secure_url'],
                'is_delivered' => 1,
            ]);
            $ref = GenerateRef(10);
            Parent::createPaymentReport($orderNo, $amount, $ref, $session->payment_intent);
           Parent::SendOrderMail($orderNo, $amount,$ref,$session->payment_intent);
           Cart::destroy();
            return $session;
        } else {
            return false;
        }
    }
}
