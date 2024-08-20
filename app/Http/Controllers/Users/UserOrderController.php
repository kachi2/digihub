<?php

namespace App\Http\Controllers\Users;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserOrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Orders()
    {
       
        $orders = DB::table('orders')->join('cart_items', 'orders.order_no', '=', 'cart_items.Order_no')
            ->where('orders.user_id', auth_user()->id)
            ->orderBy('orders.created_at', 'DESC')
            ->simplePaginate(5);
        addHashId($orders);
        return view('users.accounts.orders')
            ->with('orders',  $orders);
    }

    public function OrderDetails($order_no)
    {
        $orders = Order::where('order_no', $order_no)->first();
        if(!isset($orders)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'An error occured fetching order details');
            return back();
        }
        $order_items = CartItem::where('Order_no', $order_no)->get();
        return view('users.accounts.order_details')
            ->with('orders', $orders)
            ->with('order_items', $order_items);
    }

    public function OrderPayments()
    {
        return view('users.accounts.payments')
            ->with('payments', Payment::where('user_id', auth_user()->id)->latest()->simplePaginate(5));
    }
}
