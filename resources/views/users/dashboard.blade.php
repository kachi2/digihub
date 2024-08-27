@extends('layouts.app')
@section('content')
<div class="ps-home ps-home--8">
    <div class="ps-home__content">
     @include('users.slider.slider')

     <section class="ps-section--featured" style="padding:20px">
        {{-- <p class="section-title">Products</p > --}}
        <div class="ps-section__content">
            <div class="row m-0">

                @forelse($popular as $prod)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($prod->gallery)
                                        @php echo displayImageOrVideo($prod?->image_path, null, 300); @endphp
                                        @endif
                                    
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
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse
                @forelse($ledgers as $ledger)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$ledger->hashid, $ledger->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($ledger->gallery)
                                        @php echo displayImageOrVideo($ledger?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$ledger->hashid, $ledger->productUrl]) }}">{{ $ledger->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($ledger->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($ledger->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($ledger->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($ledger->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$ledger->hashid, $ledger->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse
                @forelse($businesses as $business)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$business->hashid, $business->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($business->gallery)
                                        @php echo displayImageOrVideo($business?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$business->hashid, $business->productUrl]) }}">{{ $business->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($business->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($business->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($business->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($business->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$business->hashid, $business->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($Spreadsheet as $Spread)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$Spread->hashid, $Spread->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($Spread->gallery)
                                        @php echo displayImageOrVideo($Spread?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$Spread->hashid, $Spread->productUrl]) }}">{{ $Spread->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($Spread->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($Spread->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($Spread->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($Spread->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$Spread->hashid, $Spread->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($coloring as $color)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$color->hashid, $color->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($color->gallery)
                                        @php echo displayImageOrVideo($color?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$color->hashid, $color->productUrl]) }}">{{ $color->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($color->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($color->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($color->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($business->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$color->hashid, $color->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($Digital as $digit)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$digit->hashid, $digit->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($digit->gallery)
                                        @php echo displayImageOrVideo($digit?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$digit->hashid, $digit->productUrl]) }}">{{ $digit->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($digit->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($digit->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($digit->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($digit->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$digit->hashid, $digit->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse


                @forelse($Cards as $Card)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$Card->hashid, $Card->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($Card->gallery)
                                        @php echo displayImageOrVideo($Card?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$Card->hashid, $Card->productUrl]) }}">{{ $Card->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($Card->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($Card->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($Card->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($Card->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$Card->hashid, $Card->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($Books as $Book)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$Book->hashid, $Book->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($Book->gallery)
                                        @php echo displayImageOrVideo($Book?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$Book->hashid, $Book->productUrl]) }}">{{ $Book->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($Book->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($Book->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($Book->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($Book->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$Book->hashid, $Book->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($Resume as $Resum)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$Resum->hashid, $Resum->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($Resum->gallery)
                                        @php echo displayImageOrVideo($Resum?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$Resum->hashid, $Resum->productUrl]) }}">{{ $Resum->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($Resum->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($Resum->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($Resum->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($Resum->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$Resum->hashid, $Resum->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @endforelse

                @forelse($Stationary as $Stationar)
                <div class="col-12 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$Stationar->hashid, $Stationar->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if($Stationar->gallery)
                                        @php echo displayImageOrVideo($Stationar?->image_path, null, 300); @endphp
                                        @endif
                                    
                                    </figure>
                                </a>
                                <div class="ps-product__badge">
                                    {{-- <div class="ps-badge ps-badge--sold">Sold Out</div> --}}
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class=""><a href="{{ route('users.products', [$Stationar->hashid, $Stationar->productUrl]) }}">{{ $Stationar->name}}</a>
                                <span style="float: right;"> 
                                    <i class="fa fa-star"> </i> 
                                     @php 
                                        $prod_rating = productRating($Stationar->id);
                                       echo number_format($prod_rating['average'],1);
                                       echo '('.number_format($prod_rating['count']).')';
                                        @endphp
                                </span>
                                </h5>
                                <div class="ps-product__meta"><span class="ps-product__price sale">{{ moneyFormat($Stationar->sale_price) }} </span><span class="ps-product__del">{{ moneyFormat($Stationar->price) }}</span>
                                   <small style="color:#434242b5"> ({{ number_format($Stationar->discount)}}% off) </small> 
                              
                                </div>
                                <span class="download-note"> 
                                    <i class="fa fa-cloud-download"> </i> Digital Download</span> 
                                    <span class="add-to-cart">  <a style="font-size:14px; font-weight:300" href="{{ route('users.products', [$Stationar->hashid, $Stationar->productUrl]) }}"> <i class="fa fa-plus"> </i> Add to basket</a>  
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
