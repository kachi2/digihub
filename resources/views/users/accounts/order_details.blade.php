@extends('layouts.app')

@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.accountSidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                    <div class="row">
                           <div class="col-12 col-md-12  p-3"  >
                            <p class="pl-3" style="color:#414040"> Order No: {{$orders->order_no}} <br>
                             Placed On: {{$orders->created_at}}<br>
                             Total Amount: {{moneyFormat($orders->payable)}}</p>  
                          </div>
                     
                       <span class="pt-5 pl-5"> Items in Your Order    </span> 
                        @forelse($order_items as $order)
                        <div class="col-12 col-md-12 " >
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnil" style="">
                                        <a class="ps-product__image" href="#">
                                            <figure><img src="{{$order->image}}" style="width: 100px" alt="{{$order->image}}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#1e1b1b">
                                            <a class="ps-product__branch" href="#">{{isset($order->product_name)?$order->product_name:null}}</a><br>
                                            <a style="color:#201c1c">Order: {{isset($order->Order_no)?$order->Order_no:null}}</a><br>
                                            <a style="color:#1c1818">QTY:  {{isset($order->qty)?$order->qty:null}}</a><br>
                                            {{isset($order->payable)?moneyFormat($order->payable,2):null}}
                                        </p>
                                    </div>
                                </div>

                                    
                                
                                <div class="ps-product__footer" >
                                    <div class="d-none  d-xl-block ">
                                    <span style=" float:right; color:rgb(10, 10, 128)"><a href=""  class="btn btn-info btn-lg" style="" >Your Item is Ready Download Now</a></span> </div>
                                </div>
                                
                            </div>
                        </div>
                        @empty 
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                    style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__conent" style="border-right:0px">
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                            <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                                Payment Information
                                            </p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span class="ps-product__price"
                                                    style="font-size:15px; "> Payment Method: {{$orders->payment_method}} </span>
                                            </div>
                                            <ul class="ps-product__list"> 
                                                <li> <span class="ps-list__title"> </span> Items Total: {{isset($orders->payable)?moneyFormat($orders->payable):moneyFormat('0')}} 
                                                </li>
                                                <li> <span class="ps-list__title"> </span>Payment Ref: {{isset($order->payment_ref)?$order->payment_ref:null}}
                                            </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             



            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

