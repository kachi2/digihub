<?php

namespace App\Http\Controllers\Users;

use App\Events\OrderShipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Mail\OrderMail;
use App\Mail\RegMail;
use App\Models\Order;
use App\Mail\paymentMail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Models\ShippingAddress;
use App\Services\PaymentService;
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
     public function __construct(
        public readonly PaymentService $PaymentService
     )
     {  
     }

     public function InitiatePayment(PaymentRequest $request)
     {
        return $this->PaymentService->InitiatePayment($request);
     }

     public function handleGatewayCallback()
    {
       $payment = $this->PaymentService->ProcessPaystackPayment(); 
       if($payment){
        Session::flash('alert', 'success');
        Session::flash('msg', 'Order completed successfully');
        return redirect(route('users.orders'));
      }
      Session::flash('alert', 'error');
      Session::flash('msg', 'The paystack token has expired. Please refresh the page and try again');
      return Redirect::back();
    }

    public function handlePaymentSuccess()
    {
        $payment = $this->PaymentService->handlePaymentSuccess();
        if($payment){
            Session::flash('alert', 'success');
            Session::flash('msg', 'Order completed successfully');
            return redirect(route('users.orders'));
          }
          Session::flash('alert', 'error');
          Session::flash('msg', 'The paystack token has expired. Please refresh the page and try again');
          return Redirect::back();
        }

        public function handleFailedPayment()
        {
            return redirect()->back();
        }
}
