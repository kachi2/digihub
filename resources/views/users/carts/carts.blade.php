@extends('layouts.app')

@section('content')

<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-7 col-lg-9 mt-5" style="background: #fff">

                <p class="m-4">Cart ({{Cart::count()}})</p> 
                <div class="ps-categogy--list">
                  
                @forelse ($carts as $cart)
                <form action="{{route('carts.update')}}" method="post" id="cartUpdate">
                    @csrf
                <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                    <div class="ps-product__content" style="border-right:0px">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="">
                                <figure><img src="{{$cart->model->image_path }}" alt="{{$cart->model->image_path }}">
                                </figure>
                            </a>
                        </div>
                  
                        <div class="ps-product__info"><a class="ps-product__branch" href="#">{{$cart->model->category->name}}</a>
                            <p class="ps-product__tite" style="font-size:16px; color:#262525"><a>{{$cart->name}}</a></p>
                            <div class="ps-product__meta"><span class="ps-product__price" style="font-size:15px">{{moneyFormat($cart->model->sale_price)}}
                                <span class="ps-product__del" style="font-size:15px">{{moneyFormat($cart->model->price)}}</span>
                            </div>
                            <ul class="ps-product__list">
                                {{-- <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">{{$cart->model->sku}}</a>
                                </li> --}}
                            </ul>
                            {{-- <button  type="submit" name="qty" value="{{$cart->qty -1 }}" class="ps-btn--primary  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                            <input type="text" value="{{$cart->qty}}"  class="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                            <input type="hidden" min="0" name="cartId" value="{{$cart->rowId}}">
                            <button  type="submit" name="qty" value="{{$cart->qty + 1}}" class="ps-btn--primary  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button>  </h6> --}}

                           <span style="floar:right"> <a href="{{route('carts.delete', $cart->rowId)}}"   class="btn btn-danger"> Remove</a></span>
                        </div>

                 
                    </div>
                </form>
                </div>
            

                    
                @empty
                <div class="ps-product ps-product--li">
                    <div class="ps-prod" style="border-right:0px">
              <p style="text-align: center"> 
                <i  style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                <br> Your cart is empty.
                You have not added any item to your cart.</p> 
                    </div>
                </div>
                @endforelse
                </div>
                </div>
                @if(count($carts) > 0)
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="ps-shopping__box mt-5" style="background: #fff">
                        <div class="ps-shopping__row" >
                            <div class="ps-shopping__label">Cart Summary</div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price">₦{{\Cart::priceTotal()}}</div>
                        </div>
                        <div class=""><i class="fa fa-cloud-download"> </i> Digital Download</div> 
                        <small> Download link will be available once payment is completed </small>
                       
                        <div class="ps-shopping__checkout">
                        <a class="ps-btn ps-btn--primary"  style="border-radius:5px" href="{{route('checkout.index',$cartSession)}}">Proceed to checkout</a>
                        <a class="ps-shopping__link" href="{{route('products.search')}}">Continue Shopping</a></div>
                    </div>
                </div>
                @endif
            </div>
        
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>
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
                                    @php echo displayImageOrVideo($prod->image_path); @endphp
                                
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
@endsection

@section('script')

@endsection