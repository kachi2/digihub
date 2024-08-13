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
                                        <div class="slide"><img src="{{$product->image_path }}" alt="{{$product->image_path }}" /></div>
                                        <div class="slide"><img src="{{$product->image_path }}" alt="{{$product->image_path }}" /></div>
                                    </div>
                                    <div class="ps-gallery--image">
                                     
                                            @if($product->gallery)
                                            @php 
                                                $images = json_decode($product->gallery);
                                            @endphp
                                            @foreach ($images as $item) 
                                            <div class="slide">
                                            <div class="ps-gallery__item"><img src="{{$item }}" alt="{{$item }}" /></div>
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
                                    <div class="ps-product__meta"><span class="ps-product__price" style="font-size:30px">{{moneyFormat($product->sale_price)}}
                                        <span class="ps-product__del">{{moneyFormat($product->price)}}</span> <small style="font-size: 14px"> {{$product->discount}}% off</small>
                                    </div>
                                    <div class="ps-subtitle pb-3 pt-3" >{{$product->title??null}}</div>
                                    <form id="myForm" enctype="multipart/form-data">
                                        @csrf
                                    <div class="ps-product__quantity">
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                            </div><button type="button" style="border-radius:5px" class="add-to-cart-btn"  id="add2cart">Add to cart</button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="download-note"> 
                                        <i class="fa fa-download"></i> 
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
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews (5)</a></li>
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
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review3.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">Jenna S.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>I ordered on Friday evening and on Monday at 12:30 the package was with me. I have never encountered such a fast order processing.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-form--review">
                                        <div class="ps-form__title">Write a review</div>
                                        <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                        <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <label class="ps-form__label">Your rating *</label>
                                                    <select class="ps-rating--form" data-value="0">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <label class="ps-form__label">Name *</label>
                                                    <input class="form-control ps-form__input">
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <label class="ps-form__label">Email *</label>
                                                    <input class="form-control ps-form__input">
                                                </div>
                                                <div class="col-12">
                                                    <div class="ps-form__block">
                                                        <label class="ps-form__label">Your review *</label>
                                                        <textarea class="form-control ps-form__textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button class="btn ps-btn ps-btn--warning">Add Review</button>
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
    <section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
            <p class="" style="font-size: 20px; color:#000;">Related products</p>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
               
                    @forelse ($latest as $prod)
                    <div class="ps-section__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">
                                        <figure><img src="{{$prod->image_path}}" alt="{{$prod->image_path}}" /><img src="{{$prod->image_path}}" alt="alt" />
                                    </figure>
                                </a>
                                <div class="ps-product__badge" style="right:20px; ">
                                    <div class="ps-badge ps-badge--hot" style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">-{{number_format($prod->discount)}}%</div>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class="ps-p"><a href="{{ route('users.products', [$prod->hashid, $prod->productUrl]) }}">{{$prod->name}}</a></h5>
                                <div class="ps-product__meta"><span class="ps-pr">{{moneyFormat($prod->sale_price)}}   <span style="font-size:15px"> <del> {{moneyFormat($prod->price)}}</del></span></span></span>
                                </div>
                                <div class="ps-product__actions ps-product__group-mobile">
                                    {{-- <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div> --}}
                                </div>
                               <center> <a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}" class="btn btn-success spinner-border spinner-border-sm"> Add to Cart</a></center> 
                            </div>
                        
                        </div>
                    </div> 
                    @empty
                    @endforelse
                </div>
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
        var myNumberInput = $('#qty');
        var incrementBtn = $('.increment-btn');
        var decrementBtn = $('.decrement-btn');
        var addToCartButton = $('#add2cart');
        
        // var counter = $('.counter');
        incrementBtn.on('click', function() {
            myNumberInput.val(parseInt(myNumberInput.val()) + 1);
                   
        });

        decrementBtn.on('click', function() {
            var currentValue = parseInt(myNumberInput.val());
            if (currentValue > 1) {
                myNumberInput.val(currentValue - 1);
            }
          
        });
        $('#precription_upload').on('change', function(){
        var file = $('#precription_upload')[0].files[0].name;
        $('#fileName').attr('hidden', false);
        $('#fileName').html(file);
    });
        addToCartButton.on('click', function() {
            if($('#fileName').is(':hidden')){
                var file = $('#precription_upload')[0].files[0]
            }else{
                file = [];
            }
            
            if(file != undefined){
                $('#add2cart').html('Please wait ....')
          var formData =  new FormData($('#myForm')[0]);
            cartId = {!! json_encode($product->id) !!}
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $.ajax({
                    url: "{{route('carts.add','')}}"+"/"+cartId,
                    type: "post",
                    data:		formData,
                    contentType: false,
                    processData: false,
                    dataType:	'json',
                    success:function(response){
                        if(response){
                            console.log(response);
                            $('.cartReload').html(response.qty); 
                           $('#popupAddcartV2').modal('show');
                            setTimeout(function() {
                                $('#popupAddcartV2').modal('hide');  
                            }, 5);
                        }else{
                            alert('no');
                        }
                        $('#add2cart').html('Add to Cart');
                    },
                 
                    error: function(xhr, status,error) {
                        console.log(xhr);
                        $('#add2cart').html('Add to Cart')
                    }
                });
            }else{
        let message = "Please upload prescription before adding item to cart"
        toastr.error(message)     
     }
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