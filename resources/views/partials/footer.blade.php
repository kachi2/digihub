<footer class="ps-footer ps-footer--8" style="background: #031233e4 !important">
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href="{{route('index')}}"> 
                                     <img src="{{asset('images/'.$settings->site_logo)}}"   style="background:#ffffffea; border-radius:5px"alt>

                                </a>
                                </div>
                                <div class="ps-footer__title">Our store</div>
                                <p>{{$settings->address}}</p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" href="{{$settings->facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                    <li><a class="ps-social__link pinterest" href="{{ $settings->pinterest}}"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                    <li><a class="ps-social__link linkedin" href="{{ $settings->linkedIn}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Categories</h5>
                                <ul class="ps-block__list">
                                    @forelse ($site_categories->take(5) as $menus)
                                    <li><a href="{{route('products.search',$menus->hashid)}}">{{ucfirst(strtolower($menus->name))}}</a></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title"></h5>
                                <ul class="ps-block__list">
                                    @forelse ($site_categories->take(5) as $menus)
                                    <li><a href="{{route('products.search',$menus->hashid)}}">{{ucfirst(strtolower($menus->name))}}</a></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{route('users.account.index')}}">My account</a></li>
                                    <li><a href="{{route('users.orders')}}">My orders</a></li>
                                    <li><a href="{{route('users.orders')}}">Recently Viewed</a></li>
                                    <li><a href="{{route('users.orders')}}">Login </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Help Links</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{ route('AboutUs')}}">About Us</a></li>
                                    <li><a href="{{ route('PrivacyPolicy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('pages.terms')}}">Terms &amp; Conditions</a></li>
                                    <li><a href="{{ route('contactUs')}}">Contact Us</a></li>
                                    <li><a href="{{ route('blogs.index')}}">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-4" >
                </div>
                <div class="col-12 col-md-4" >
                    <p style="color:#ffffff">{{$settings->site_copyright}}</p>
                </div>
                <div class="col-12 col-md-4 text-right" >
                    <img src="{{asset('/images/paystack_logo.png')}}"  width="70px" alt>
                    <img class="payment-light" src="{{asset('/images/paystack.png')}}"      width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/secure_ssl.png')}}"  width="50px" alt>
                    <img class="payment-light" src="{{asset('/images/mastercard.png')}}" style="background:#ffffff"  width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/visa.png')}}" style="background:#ffffff" width="50px" alt>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>