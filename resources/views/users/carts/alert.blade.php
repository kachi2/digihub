


<div class="modal fade" id="popupAddcartV2"  data-keyboard="true" tabindex="-1" aria-hidden="true" style="top:-80%; background:none; width:100%">
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body" style="background: #103178 !important; padding:5px">
                <div class="">
                    <div class="ps-addcart__overlay">
                        <div class="ps-addcart__loading"></div>
                    </div>
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="pi ps-btn--primary">
                        <div class="container" style="text-align: center">
                            <p class="m-0" style="color:#fff;"> 
                                @if(isset($product->image_path))
                                @php echo displayImageOrVideo($product->image_path, 30,30); @endphp
                                @endif
                                {{-- <img src="{{$product->image_path}}" style="width:30px; height:30px" alt="{{$product->image_path}}" />  --}}
                                {{$product->name}} Added to Cart Successfully</p>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>