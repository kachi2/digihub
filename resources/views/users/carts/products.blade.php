@extends('layouts.app')
@section('content')

<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">{{ucwords(strtolower($product->category->name))}}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">{{$product->name}}</li>
           
        </ul>
       
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-12 col-12">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                              <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">

                                        @if(isset($product->gallery))
                                        @php 
                                            $images = json_decode($product->gallery);
                                        @endphp
                                        @foreach ($images as $item) 
                                        <div class="slide">
                                        <div class="">
                                            @php echo displayImageOrVideo($item); @endphp
                                        </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="ps-gallery--image">
                                     
                                            @if(isset($product->gallery))
                                            @php 
                                                $images = json_decode($product->gallery);
                                            @endphp
                                            @foreach ($images as $item) 
                                            <div class="slide">
                                            <div class="ps-gallery__item">
                                                @php echo displayImageOrVideo($item); @endphp
                                            </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        
                                    </div>
                                </div> 
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="ps-product__info">
                                    <div class="ps-product__branch"><a href="{{route('products.search', $product->category->hashid )}}">{{$product->category->name}}</a></div>
                                    <div class="ps-product__title"><a href="#">{{$product->name}}</a></div>
                                    <span style="float: ;"> 
                                        @php 
                                        $prod_rating = productRating($product->id);
                                       $rating =  number_format($prod_rating['average'],1);
                                       $count =   $prod_rating['count'];
                                        $rates = RatingCounting($rating);
                                        @endphp
                                        Product rating:   @php echo $rates; @endphp
                                             {{$rating}}({{number_format($count)}})
                                       
                                    </span>
                                    <div class="ps-product__meta"><span class="ps-product__price" style="font-size:30px">{{moneyFormat($product->sale_price)}}
                                        <span class="ps-product__del">{{moneyFormat($product->price)}}</span> <small style="font-size: 14px"> {{$product->discount}}% off</small>
                                    </div>
                                    <div class="ps-subtitle pb-3 pt-3" >{{$product->title??null}}</div>
                                    <form id="myForm" enctype="multipart/form-data">
                                        @csrf
                                    <div class="ps-product__quantity">
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                            </div><button type="button" style="border-radius:5px" class="add-to-cart-btn addToCartButton"  id="add2cart">Add to cart</button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="download-note"> 
                                        <i class="fa fa-cloud-download"></i> 
                                        Item will be available for download once payment is completed
                                    </div>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                        Share this Product
                                            <li><a class="ps-social__link facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter"  target="_blank" href="https://twitter.com/share?url={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li ><a class="ps-social__link whatsapp" target="_blank"  data-action="share/whatsapp/share"  href="https://api.whatsapp.com/send?text={{ route('users.products', [$product->hashid, $product->productUrl]) }}"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            @if(Session::has('alert'))
                           <span class="badge badge-{{session::get('alert')}}"> {{Session::get('message')}} </span> 
                            @endif
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews ({{$product->reviews->count()}})</a></li>
                            </ul>
                            <div class="tab-content" id="productContent">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <div class="row row-reverse">
                                            <div class="col-12 col-md-6"><img class="ps-thumbnail" src="" alt></div>
                                            <div class="col-12 col-md-6">
                                                <p class="">{{$product->name}}</p>
                                                <p> {!! $product->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="ps-product__tabreview">
                                        @forelse($product->reviews->take(3) as $review)
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><i class="fa fa-user"> </i></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">{{ucfirst($review->user->first_name)}} {{ucfirst($review->user->last_name)}}</div>
                                                    <div class="ps-review__date">{{$review->created_at->format('d M, Y')}}</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                   @php echo RatingCounting($review->rating) @endphp
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>{{$review->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @empty 
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__desc">
                                                    <p>No review for this product yet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                            </div>
                                    <div class="ps-form--review">
                                        <div class="ps-form__title">Write a review</div>
                                        <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                        <form action="{{route('user.addReview')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-7 col-lg-7">
                                                    <label class="ps-form__label">Your rating *</label>
                                                    <select class="form-control" data-value="" name="rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <div class="ps-form__block">
                                                        <label class="ps-form__label">Your review *</label>
                                                        <textarea class="form-control ps-form__textarea" name="message"></textarea>
                                                    </div>
                                                    <button class="btn ps-btn ps-btn--primary">Add Review</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ps-section--featured" style="padding:20px">
        <p class="section-title">Related Products</p >
        <div class="ps-section__content">
            <div class="row m-0">

                @forelse($latest as $prod)
                <div class="col-6 col-md-6 col-lg-3 p-0">
                    <div class="ps-section__product " >
                        <div class="ps-product ps-product--standard cart-card">
                            <div class="ps-product__thumbnail ">
                                <a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}" style="min-height:300px">
                                    <figure>
                                        @if(isset($prod->image_path))
                                        @php echo displayImageOrVideo($prod->image_path); @endphp
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

            </div>
        </div>
    </section>
</div>

{{-- @if(Session::has('cartalert')) --}}
@include('users.carts.alert')
{{-- @endif --}}

@endsection

@section('script')

<script>


    $(document).ready(function() {
        let addToCartButton = $('#add2cart');
        addToCartButton.on('click', function() {
                $('#add2cart').html('Please wait ....')
            cartId = {!! json_encode($product->id) !!}
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $.ajax({
                    url: "{{route('carts.add','')}}"+"/"+cartId,
                    type: "post",
                    dataType:	'json',
                    success:function(response){
                        if(response){
                            console.log(response);
                            $('.cartReload').html(response.qty); 
                           $('#popupAddcartV2').modal('show');
                            setTimeout(function() {
                                $('#popupAddcartV2').modal('hide');  
                            }, 5);
                                //  toastr.success('Item added to cart successfully')    
                        }else{
                        }
                        $('#add2cart').html('Add to Cart');
                    },
                 
                    error: function(xhr, status,error) {
                        console.log(xhr);
                        $('#add2cart').html('Add to Cart')
                    }
                });
            // let message = "Please upload prescription before adding item to cart"
            // toastr.error(message)     
        });   
    });


    function thousands_separators(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

</script>
@endsection