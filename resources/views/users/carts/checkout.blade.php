@extends('layouts.app')
@section('content')
@section('styles')
    <style>
        .delivery {
            color: #343232;
            font-size: 14px;
            font-family: Verdana, 'Geneva', Tahoma, sans-serif"

        }
    </style>
@endsection
<div class="ps-shopping" style="background: #eee">
    <form action="{{route('payment.checkout')}}" method="post">
        @csrf
        <div class="container">
            <div class="ps-shopping__content">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-9 mt-5"
                        style="background: #fffcfc; border-radius: 10px 10px 0px 0px">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 mt-0"
                                style="background: #878484;  border-radius: 10px 10px 0px 0px">
                                <p class="m-4" style="color:#ffffff; font-weight:bolder"> Select Payment Method</p>

                            </div>
                            <div class="col-12 col-md-12 col-lg-12 mt-5 " style="background:">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <label data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <div class="row">
                                                    <div style="width: 20px; padding-left:10px">
                                                        <input style="border-radius: 5px"
                                                            class="@error('payment_method') is-invalid @enderror" type="radio"
                                                            value="{{ old('payment_method', 'paystack') }}" id="paystack" name="payment_method">
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-12">
                                                       <strong> Secure Card Payment with Paystack </strong> 
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-2">
                                                        <img src="{{ asset('frontend/paystack.webp') }}" >
                                                    </div>

                                                </div>
                                            </label>
                                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                   <small> Pay with Paystack for both local and internation cards, your card
                                                    information is secure, and your card is not charged until after
                                                    you've confirmed your order
                                                </small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="accordion" id="accordionExampleTwo">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <label data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="true" aria-controls="collapseTwo">
                                                <div class="row">
                                                    <div style="width: 20px; padding-left:10px">
                                                        <input style="border-radius: 5px" 
                                                            class="@error('payment_method') is-invalid @enderror" type="radio"
                                                            value="{{ old('payment_method', 'stripe') }}" id="paystack" name="payment_method">
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-12">
                                                        <strong> Secure Card Payment with Stripe</strong>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-2">
                                                        <img src="{{ asset('frontend/stripe.webp') }}">
                                                    </div>

                                                </div>
                                            </label>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExampleTwo">
                                                <div class="card-body">
                                                <small> 
                                                    You can use any card on Stripe, please make sure you choose the
                                                    correct information to enable complete your payment
                                                </small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    @if (count($carts) > 0)
                        <div class="col-12 col-md-5 col-lg-3">
                            <div class="ps-shopping__box mt-5" style="background: #fff">
                                <div class="ps-shopping__row">
                                    <div class="ps-shopping__label">Cart Summary</div>
                                </div>
                                <div class="ps-shopping__row">
                                    <div class="ps-shopping__label">Item Total</div>
                                    <div class="ps-shopping__price"> ₦ {{ \Cart::priceTotal() }}</div>
                                </div>
                                <div class="ps-shopping__row">
                                    <div class="ps-shopping__label">Total</div>
                                    <div class="ps-shopping__price" id="total">
                                        {{ moneyFormat(\Cart::priceTotalFloat()) }}</div>
                                    <input type="hidden" id="sub_total" value={{ \Cart::priceTotalFloat() }}>
                                </div>
                                <div class="ps-shopping__text">You will be able to add a voucher when selecting your payment method</div>
                                <input type="hidden" id="amount" name="amount"
                                    value="{{ \Cart::priceTotalFloat() }}">
                                    <input type="hidden" name="orderNo" value="{{$orderNo}}"> 
                                <div class="ps-shopping__checkout">
                                    <button class="ps-btn ps-btn--primary" style="border-radius:5px"
                                        href="{{ route('checkout.index') }}">Complete Order</button>
                                    <a class="ps-shopping__link" href="{{ route('shops.index') }}">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </form>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
<script></script>
<script></script>
@endsection
