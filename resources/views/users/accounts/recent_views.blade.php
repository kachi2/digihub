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
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> {{_('<-back ')}} </a> <hr style="width:100%"></span>
                        <section class="ps-section--featured" style="padding:20px">
                            <p class="section-title">Recently Viewed products</p >
                            <div class="ps-section__content">
                                <div class="row m-0">
                    
                                    @forelse($recent as $prod)
                                    <div class="col-6 col-md-6 col-lg-4 p-0">
                                        <div class="ps-section__product " >
                                            <div class="ps-product ps-product--standard cart-card">
                                                <div class="ps-product__thumbnail ">
                                                    <a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}" style="min-height:100px">
                                                        <figure>
                                                            @php echo displayImageOrVideo($prod->image_path,null,200); @endphp
                                                            
                                                        
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__badge">
                                                        {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                                    </div>
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class=""><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{ $prod->name}}</a>
                                                    <span style="float: right;"> 
                                                        <i class="fa fa-star"> </i> 
                                                         @php 
                                                            $prod_rating = productRating($prod->id);
                                                           echo number_format($prod_rating['average'],1);
                                                           echo '('.number_format($prod_rating['count']).')';
                                                            @endphp
                                                    </span>
                                                    </h5>
                                                    <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($prod->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($prod->price) }}</span>
                                                       <small style="color:#434242b5"> ({{ number_format($prod->discount)}}% off) </small> 
                                                  
                                                    </div>
                                                  
                                                        <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a> 
                                                            <span class="download-note">    <i class="fa fa-cloud-download"> </i> <small style="font-size:10px">Digital</small></span>  
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

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



