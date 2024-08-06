@extends('layouts.app')

@section('content')
    <div class="ps-home ps-home--8">
        <div class="ps-home__content">
            <div class="container">
                {{-- <div class="ps-promo"><a class="ps-promo__item" href="{{route('products.search')}}"><img class="ps-promo__text"
                            src="{{ asset('/frontend/img/' . $advert_top->image_path) }}" alt><img class="ps-promo__banner"
                            src="{{ asset('/frontend/img/' . $advert_top->txt) }}" alt></a></div> --}}
                {{-- <div class="ps-promo mobile"><a class="ps-promo__item" href="#"><img class="ps-promo__text" src="{{asset('/frontend/img/'.$advert_top->txt)}}" alt><img class="ps-promo__banner" src="{{asset('/frontend/img/'.$advert_top->image_path)}}" alt></a></div> --}}
                <section class="ps-section--banner ps-banner--container">
                    <div class="ps-section__overlay">
                        <div class="ps-section__loading"></div>
                    </div>
                    <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="4000"
                        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                        data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                        data-owl-mousedrag="on">
                        @forelse ($sliders as $slider)
                            <div class="ps-banner" style="background:#306A53;">
                                <div class="container-no-round">
                                    <div class="ps-banner__block">
                                        <div class="ps-banner__content">
                                            {{-- <h2 class="ps-banner__title text-white">{{ $slider->title }}</h2>
                                            <div class="ps-banner__desc text-white">{{ $slider->content }}</div>
                                            <div class="ps-banner__btn-group">
                                            </div> --}}
                                            
                                    {{-- <div class="ps-banner__persen bg-warning ps-left">
                                       
                                    </div> --}}
                                        </div>
                                         <div class="ps-banner__thumnail ps-banner__fluid">
                                             <a style="position:inherit" href="{{route('products.search')}}">
                                           <img class="ps-banner__image" src="{{asset('/images/products/'.$slider->image_path) }}" alt="{{asset('/images/products/'.$slider->image_path) }}" />
                                             </a>
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>

                  
                </section>
                <section class="ps-section--category ps-category--image">
                    {{-- <h3 class="ps-section__title">Check out the most popular categories</h3> --}}
                    <div class="ps-section__content">
                        <div class="row" style="background: #eae7e73f; padding:10px; border:5px solid #ede8e836">
                            @forelse ($site_categories->take(10) as  $cat)
                                <div class="col-6 col-md-4"  style="background:url('{{ $cat->image_path}}'); z-index:1000" >
                                    <div class="ps-category__thumbnail"> 
                                        <a class="ps-category__image" href="{{ route('products.search', $cat->hashid) }}">
                                            <img src="{{ $cat->image_path}}" alt="{{ $cat->image_path}}">
                                        </a>
                                        <div class="ps-category__content">
                                            <a class="ps-category" href="{{route('products.search', $cat->hashid)}}"> <span class="ps-category__more">{{ $cat->name }}</span></a> <br>
                                            {{-- <a class="ps-category__more" href="{{route('products.search', $cat->hashid)}}"></a> --}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>
            <section class="ps-section--latest" style="margin-top:5px">
                <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                    <p class="" style="font-size: 20px; color:#000;">Latest products</p>
                    <div class="ps-section__carousel">
                        <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="13000"
                            data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2"
                            data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5"
                            data-owl-duration="1000" data-owl-mousedrag="on">

                            @forelse ($latest as $prod)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">
                                                {{-- <figure><img src="{{asset('/frontend/img/products/016.jpg')}}" alt="alt" /><img src="{{asset('/frontend/img/products/021.jpg')}}" alt="alt" /> --}}
                                                <figure><img src="{{asset('/images/products/'.$prod->image_path) }}" alt="{{ asset('/images/products/'.$prod->image_path) }}" /><img
                                                        src="{{ asset('/images/products/'.$prod->image_path)}}" alt="{{ asset('/images/products/'.$prod->image_path) }}" />
                                                </figure> 
                                            </a>
                                            <div class="ps-product__badge" style="right:20px; ">
                                                <div class="ps-badge ps-badge--hot"
                                                    style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                                    -{{number_format($prod->discount)}}%</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-p"><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{ $prod->name }}</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-pr">{{ moneyFormat($prod->sale_price) }} <span
                                                        style="font-size:15px"> <del>{{ moneyFormat($prod->price) }}
                                                        </del></span></span></span>
                                            </div>
                                            <center> <a
                                                    href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}"
                                                    class="btn  btn-lg" style="background:#07631d; color:#fff"> Add to
                                                    Cart</a></center>
                                        </div>

                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                
            </section>
            <div class="container">
                <div class="ps-promo ps-home__promo" style="background: #eee">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-promo__item"><img class="ps-promo__banner"
                                    src="{{asset('/images/products/'.$advert[0]->image_path)}}" alt="{{asset('/images/products/'.$advert[0]->image_path)}}" />
                                <div class="ps-promo__content">
                                    {{-- <h4 class="text-whte ps-promo__name">{{$advert[0]->name}}</h4> --}}
                                    <div class="ps-promo__sale ps-promo__btn">from {{moneyFormat($advert[0]->sale_price)}}</div>
                                    
                                    <a class="ps-promo__btn"
                                        href="{{ route('users.products', [$advert[0]->hashid, $advert[0]->productUrl]) }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="ps-promo__item"><img class="ps-promo__banner"
                                    src="{{ asset('/images/products/'.$advert[1]->image_path) }}" alt="{{ asset('/images/products/'.$advert[1]->image_path) }}" />
                                <div class="ps-promo__content">
                                    {{-- <h4 class="ps-promo__name">{{$advert[1]->name}}</h4> --}}
                                    <div class="ps-promo__meta d-horizontal"> 
                                        <p class="ps-promo__price  ps-promo__btn">from {{moneyFormat($advert[1]->sale_price)}}</p>
              
                                    </div><a class="ps-promo__btn" href="{{ route('users.products', [$advert[1]->hashid, $advert[1]->productUrl]) }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="ps-promo__item"><img class="ps-promo__banner"
                                    src="{{ asset('/images/products/'.$advert[2]->image_path) }}" alt="{{ asset('/images/products/'.$advert[2]->image_path) }}" />
                                <div class="ps-promo__content">
                                    {{-- <h4 class="ps-promo__name">{{$advert[1]->name}}</h4> --}}
                                    <div class="ps-promo__meta d-horizontal"> 
                                        <p class="ps-promo__price  ps-promo__btn"> from {{moneyFormat($advert[2]->sale_price)}}</p>
                                    </div><a class="ps-promo__btn" href="{{ route('users.products', [$advert[2]->hashid, $advert[2]->productUrl]) }}">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-delivery" data-background="img/promotion/banner-delivery-2.jpg" style="background-image: url(&quot;img/promotion/banner-delivery-2.jpg&quot;);">
                    <div class="ps-delivery__content">
                        <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>100% Secure delivery, </strong>100% Secured payment options</span></div><a class="ps-delivery__more" href="{{route('products.search')}}">Shop Now</a>
                    </div>
                </div>
                <section class="ps-section--featured"
                    style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                    <p class="" style="font-size: 20px; color:#000;">Top Products</p>
                    <div class="ps-section__content">
                        <div class="row m-0">
                            @forelse ($topProducts1 as $prods1)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{ route('users.products', [$prods1->hashid, $prods1->productUrl]) }}"> 
                                                    {{-- <figure><img src="{{asset('/frontend/img/products/016.jpg')}}" alt="alt" /><img src="{{asset('/frontend/img/products/021.jpg')}}" alt="alt" /> --}}
                                                    <figure><img src="{{asset('/images/products/'.$prods1->image_path)}}" alt="{{asset('/images/products/'.$prods1->image_path)}}" /><img
                                                            src="{{asset('/images/products/'.$prods1->image_path)}}" alt="{{asset('/images/products/'.$prods1->image_path)}}" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__badge" style="right:20px; ">
                                                    <div class="ps-badge ps-badge--hot"
                                                        style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                                       - {{number_format($prods1->discount)}}%</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-p"><a
                                                        href="{{ route('users.products', [$prods1->hashid, $prods1->productUrl]) }}">{{ $prods1->name }}</a>
                                                </h5>
                                                <div class="ps-product__meta"><span
                                                        class="ps-pr">{{ moneyFormat($prods1->sale_price) }} <span
                                                            style="font-size:15px"> <del>{{ moneyFormat($prods1->price) }}
                                                            </del> </span></span></span>
                                                </div>
                                                <center> <a
                                                        href="{{ route('users.products', [$prods1->hashid, $prods1->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#07631d; color:#fff"> Add to
                                                        Cart</a></center>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>

                    </div>
                </section>


                <section class="ps-section--featured mt-5"
                    style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                    <p class="" style="font-size: 20px; color:#000;">{{ count($productCat2) > 0? $productCat2[0]->category->name:'' }}</p>
                    <div class="ps-section__content">
                        <div class="row m-0">
                            @forelse ($productCat2 as $productCats2)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{ route('users.products', [$productCats2->hashid, $productCats2->productUrl]) }}">
                                        
                                                        <figure><img src="{{$productCats2->image_path}}" alt="{{$productCats2->image_path}}" /><img src="{{$productCats2->image_path}}" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__badge" style="right:20px; ">
                                                    <div class="ps-badge ps-badge--hot"
                                                        style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                                        -{{ number_format($productCats2->discount) }}%</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-p"><a
                                                        href="{{ route('users.products', [$productCats2->hashid, $productCats2->productUrl]) }}">{{ $productCats2->name }}</a>
                                                </h5>
                                                <div class="ps-product__meta"><span
                                                        class="ps-pr">{{ moneyFormat($productCats2->sale_price) }} <span
                                                            style="font-size:15px"> <del>{{ moneyFormat($productCats2->price) }}
                                                            </del> </span></span></span>
                                                </div>
                                                <center> <a
                                                        href="{{ route('users.products', [$productCats2->hashid, $productCats2->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#07631d; color:#fff"> Add to
                                                        Cart</a></center>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </section>

                <section class="ps-section--featured mt-5"
                    style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                    <p class="" style="font-size: 20px; color:#000;">{{ count($productCat3)> 0?$productCat3[0]->category->name:'' }}</p>
                    <div class="ps-section__content">
                        <div class="row m-0">
                            @forelse ($productCat3 as $prod3)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{ route('users.products', [$prod3->hashid, $prod3->productUrl]) }}">
                                                    <figure><img src="{{ asset('/images/products/'.$prod3->image_path) }}"
                                                            alt="{{ asset('/images/products/'.$prod3->image_path) }}" /><img
                                                            src="{{ asset('/images/products/'.$prod3->image_path) }}"
                                                            alt="{{ asset('/images/products/'.$prod3->image_path) }}" />
                                                        {{-- <figure><img src="{{$prod->image_path}}" alt="alt" /><img src="{{$prod->image_path}}" alt="alt" /> --}}
                                                    </figure>
                                                </a>
                                                <div class="ps-product__badge" style="right:20px; ">
                                                    <div class="ps-badge ps-badge--hot"
                                                        style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                                        -{{ number_format($prod3->discount) }}%</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-p"><a
                                                        href="{{ route('users.products', [$prod3->hashid, $prod3->productUrl]) }}">{{ $prod3->name }}</a>
                                                </h5>
                                                <div class="ps-product__meta"><span
                                                        class="ps-pr">{{ moneyFormat($prod3->sale_price) }} <span
                                                            style="font-size:15px"> <del>{{ moneyFormat($prod3->price) }}
                                                            </del> </span></span></span>
                                                </div>
                                                
                                                <center> <a
                                                        href="{{ route('users.products', [$prod3->hashid, $prod3->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#07631d; color:#fff"> Add to
                                                        Cart</a></center>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </section>

                <section class="ps-section--featured mt-5"
                    style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
                    <p class="" style="font-size: 20px; color:#000;">{{ count($productCat4) > 0? $productCat4[0]->category->name:'' }}</p>
                    <div class="ps-section__content">
                        <div class="row m-0">
                            @forelse ($productCat4 as $prod4)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{ route('users.products', [$prod4->hashid, $prod4->productUrl]) }}">
                                                    <figure><img src="{{ $prod4->image_path }}"
                                                            alt="{{$prod4->image_path }}" /><img
                                                            src="{{$prod4->image_path }}"
                                                            alt="{{$prod4->image_path }}" />
                                                        {{-- <figure><img src="{{$prod->image_path}}" alt="alt" /><img src="{{$prod->image_path}}" alt="alt" /> --}}
                                                    </figure>
                                                </a>
                                                <div class="ps-product__badge" style="right:20px; ">
                                                    <div class="ps-badge ps-badge--hot"
                                                        style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">
                                                        -{{ number_format($prod4->discount)}}%</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-p"><a
                                                        href="{{ route('users.products', [$prod4->hashid, $prod4->productUrl]) }}">{{ $prod4->name }}</a>
                                                </h5>
                                                <div class="ps-product__meta"><span
                                                        class="ps-pr">{{ moneyFormat($prod4->sale_price) }} <span
                                                            style="font-size:15px"> <del>{{ moneyFormat($prod4->price) }}
                                                            </del> </span></span></span>
                                                </div>
                                                
                                                <center> <a
                                                        href="{{ route('users.products', [$prod4->hashid, $prod4->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#07631d; color:#fff"> Add to
                                                        Cart</a></center>
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
            <div class="ps-home__line"></div>

        </div>
    </div>
@endsection
