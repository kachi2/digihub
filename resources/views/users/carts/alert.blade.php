


<div class="modal fade" id="popupAddcartV2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true" style="top:-70%; background:none" >
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body" style="background: #12a05c !important; padding:5px">
                <div class="">
                    <div class="ps-addcart__overlay">
                        <div class="ps-addcart__loading"></div>
                    </div>
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="pi ps-btn--success">
                        <div class="container" style="text-align: center">
                            <p class="m-0" style="color:#fff;"> <img src="{{asset('/frontend/img/products/034.jpg')}}" style="width:30px; height:30px" alt="alt" /> {{$product->name}} Added to Cart Successfully</p>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>