@extends('layouts.app')
@section('content')


<div class="ps-categogy ps-categogy--dark" style="background: #e8e8e8;">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">Category</a></li>
            <li class="ps-breadcrumb__item"><a href="">Products</a></li>
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9" style="background: #fff; padding: 10px; border-radius: 10px; top:-40px">
                    <div class="ps-categogy__wrapper">
                      
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct" checked  disabled>
                                    <label class="custom-control-label" for="onSaleProduct">@if(isset($searchterm)) {{$searchterm}} @else Showing All Results @endif</label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            {{-- <form><span>Sort by</span> --}}
                                <select class="form-select">
                                    {{-- <option selected="">Latest</option>
                                    <option value="Popularity">Popularity</option> --}}
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            @forelse ($products as $prod )
                            <div class="col-6 col-md-6 col-lg-3 p-0">
                                <div class="ps-section__product " >
                                    <div class="ps-product ps-product--standard cart-card">
                                        <div class="ps-product__thumbnail ">
                                            <a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}" style="min-height:180px">
                                                <figure>
                                                    @php echo displayImageOrVideo($prod->image_path, null,200); @endphp
                                                
                                                </figure>
                                            </a>
                                            <div class="ps-product__badge">
                                                {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class=""><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{ $prod->name}}</a>
                                            <span style="float: right;"> &nbsp;  &nbsp;
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
                                            <span class="download-note"> 
                                                <i class="fa fa-cloud-download"> </i> Digital</span> 
                                                <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="ps-delivery ps-delivery--info">
                                <div class="ps-delivery__content">
                                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>No Item found </strong></span></div>
                                </div>
                            </div>
                            @endforelse
                          
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="ps-widget ps-widget--product" style="
                    background: #fff;
                    border-radius: 10px;
                    padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                  
                                 @forelse ($categories as $cat )
                                    <li><a href="{{route('products.search',$cat->hashid)}}" style="font-size: 14px">{{substr($cat->name, 0,30)}}</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            @foreach ($cat->products as $prod )
                                           
                                            <li><a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}">{{$prod->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                     
                                 @empty
                                     
                                 @endforelse 

                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection