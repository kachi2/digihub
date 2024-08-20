<footer class="ps-footer ps-footer--8" style="background: #103178d2 !important">

    <div class="container">
        <div class="ps-footer__middle" >
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href="{{route('index')}}"> <img src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px" alt>
                                    <img class="logo-white" src="{{asset('images/'.$settings->site_logo)}}"  style="border-radius: 5px" alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-black" src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px"  alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-white-all" src="{{asset('images/'.$settings->site_logo)}}"  style="border-radius: 5px" alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-green" src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px"  alt="{{asset('images/'.$settings->site_logo)}}" ></a></div>
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
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__fax"><i class="icon-telephone"></i>{{$settings->site_phone}}</div>
                                <p class="ps-footer__work">{{$settings->site_email}}</p>
                              
                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-6 col-md-4">
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
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{route('users.account.index')}}">My account</a></li>
                                    <li><a href="{{route('users.orders')}}">My orders</a></li>
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
                <div class="col-12 col-md-4" style="background: #fff">
                </div>
                <div class="col-12 col-md-4" style="background: #fff">
                    <p style="color:#000">{{$settings->site_copyright}}</p>
                </div>
                <div class="col-12 col-md-4 text-right" style="background: #fff">
                    <img src="{{asset('/images/paystack_logo.png')}}"  width="70px" alt>
                    <img class="payment-light" src="{{asset('/images/paystack.png')}}"      width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/secure_ssl.png')}}"  width="50px" alt>
                    <img class="payment-light" src="{{asset('/images/mastercard.png')}}"  width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/visa.png')}}"  width="50px" alt>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>