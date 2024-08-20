<div class="ps-menu--slidebar">
    <div class="ps-menu__content">
        <ul class="menu--mobile">
            <li><a href="{{route('users.account.index')}}">My account</a></li>
            <li><a href="{{route('users.orders')}}">My orders</a></li>
            <li><a href="{{ route('AboutUs')}}">About Us</a></li>
            <li><a href="{{ route('PrivacyPolicy')}}">Privacy Policy</a></li>
            <li><a href="{{route('pages.terms')}}">Terms &amp; Conditions</a></li>
            <li><a href="{{ route('contactUs')}}">Contact Us</a></li>
            {{-- <li><a href="{{ route('blog')}}">Blog</a></li> --}}
            <li><a href="{{ route('faq.index')}}">FAQ</a></li>
        </ul>
    </div>
    <div class="ps-menu__footer">
        <div class="ps-menu__item">
            <ul class="ps-language-currency">
                <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                </li>
                <li class="menu-item-has-children"><a href="#">NGN</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                </li>
            </ul>
        </div>
        <div class="ps-menu__item">
            <div class="ps-menu__contact">Need help? <strong>{{$settings->site_phone}}</strong></div>
        </div>
    </div>
</div>