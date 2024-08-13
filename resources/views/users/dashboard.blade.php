@extends('layouts.app')
@section('content')
<div class="ps-home ps-home--8">
    <div class="ps-home__content">
     @include('users.slider.slider')

     <section class="ps-section--featured" style="padding:20px">
        <h3 class="ps-section__title">Bestsellers</h3>
        <div class="ps-section__content">
            <div class="row m-0">

                @forelse($latest as $prod)
                <div class="col-6 col-md-6 col-lg-4 p-0">
                    <div class="ps-section__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__image" href="product1.html">
                                    <figure><img src="{{$prod->image_path}}"  alt="alt" /><img src="{{$prod->image_path}}" alt="alt" />
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    <div class="ps-badge ps-badge--sold">Sold Out</div>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{ $prod->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 4.3 (34)
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($prod->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($prod->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($prod->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> <i class="fa fa-download"> </i> Digital Download</span>
                                <div class="ps-product__desc">
                                    <ul class="ps-product__list">
                                        <li>Study history up to 30 days</li>
                                        <li>Up to 5 users simultaneously</li>
                                        <li>Has HEALTH certificate</li>
                                    </ul>
                                </div>
                                <div class="ps-product__actions ps-product__group-mobile">
                                    <div class="ps-product__quantity">
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                    <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                    <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

            </div>
        </div>
    </section>
</div>






@endsection
