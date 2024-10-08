@extends('layouts.app')
@section('content')
@section('styles')
    <style>
        .labl {
            display: block;
        }

        .labl>input {
            /* HIDE RADIO */
            visibility: hidden;
            position: absolute;
        }

        .labl>input+div {
            /* DIV STYLES */
            cursor: pointer;
            border: 2px solid transparent;
        }

        .labl>input:checked+div {
            /* (RADIO CHECKED) DIV STYLES */
            background-color: #ffd6bb;
            border: 1px solid #ff6600;
        }
    </style>
@endsection
<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-9 mt-5">
                    <form action="{{route('users.RegisterUser')}}" method="post">
                        @csrf
                    <div class="row">
                 @if(Session::has('alert'))
                 <span class="badge bg-{{Session::get('alert')}} p-2"> {{Session::get('msg')}}</span>
                 @endif
                 <div class="col-12 col-md-12 col-lg-12 mt-0"
                 style="background: #878484;  border-radius: 10px 10px 0px 0px">
                 <p class="m-4" style="color:#ffffff; font-weight:bolder"> Contact Information</p>
                            </div>
                      <div class="col-12 col-md-12 col-lg-12 mt-0 " style="background:#fff">
                            <div class="row m-3">
                                <div class="col-12 col-md-6 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> First Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('first_name') is-invalid @enderror" type="text"
                                            value="{{old('first_name')}}" placeholder="First name" id="name" name="first_name">
                                    </div>
                                    {{-- @error('first_name')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror --}}
                                </div>
                                <div class="col-12 col-md-6 ">
                                    <div class="ps-form__group">
                                        <label for="last_name" style="color:rgb(114, 111, 111)"> Last Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('last_name') is-invalid @enderror" type="text"
                                            value="{{old('last_name')}}" placeholder="Full name" id="name" name="last_name">
                                    </div>
                                    {{-- @error('last_name')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="row m-3">

                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                        <input class="form-control ps-form__input @error('phone') is-invalid @enderror" type="text"
                                            placeholder="Phone Number" id="phone"  value="{{old('phone')}}" name="phone">
                                    </div>
                                    {{-- @error('phone')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror --}}
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="email" style="color:rgb(114, 111, 111)"> Email Address</label>
                                        <input class="form-control ps-form__input @error('email') is-invalid @enderror" type="email"
                                            placeholder="Email Address"  id="email" value="{{old('email')}}" name="email">
                                    </div>
                                    {{-- @error('email')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="m-4" style="">
                                <button class="ps-btn ps-btn--primary w-25" style="border-radius: 5px">Save and Continue</button>
                            </div>
                        </div>
                  

                        <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                            <p class="m-4" style="color:rgb(114, 111, 111)"><i class="fa fa-check-square-o"
                                style="color:rgb(114, 111, 111)"></i> Payment Method</p>

                        </div>
                    </div>
                    </form>
                </div>

                @if (count($carts) > 0)
                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="ps-shopping__box mt-5" style="background: #fff">
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Cart Summary</div>
                            </div>

                            <div class="ps-shopping__form">
                                <div class="ps-shopping__group">
                                    <input class="form-control ps-input" type="text" placeholder="County">
                                </div>
                                <div class="ps-shopping__group">
                                    <input class="form-control ps-input" type="text" placeholder="Town / City">
                                </div>
                                <div class="ps-shopping__group">
                                    <input class="form-control ps-input" type="text" placeholder="Postcode">
                                </div>
                            </div>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Total</div>
                                <div class="ps-shopping__price">₦{{ \Cart::priceTotal() }}</div>
                            </div>
                            <div class="ps-shopping__text">Shipping options will be updated during checkout.</div>

                            <div class="ps-shopping__checkout">
                                {{-- <a class="ps-btn ps-btn--primary"
                                    style="border-radius:5px" href="{{ route('checkout.index') }}">Proceed to
                                    checkout</a> --}}
                                <a class="ps-shopping__link" href="{{ route('shops.index') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
<script></script>
@endsection
