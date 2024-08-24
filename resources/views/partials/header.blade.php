<header class="ps-header ps-header--1">
    <div class="ps-noti p-2" style="background: #f1641e!important">
        <div class="container" >
            <p class="m-0" style="color:#000"> {!! $announcment->content??null !!}</p>
        </div>
        {{-- <a class="ps-noti__close"><i class="icon-cross"></i></a> --}}
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="{{route('index')}}"> 
                <img src="{{asset('images/'.$settings->site_logo)}}" style="width: 120px" alt>
            <img class="sticky-logo" src="{{asset('images/'.$settings->site_logo)}}" alt=""></a>
            {{-- <i class="fa fa-bars"></i>Products --}}
        </div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    @guest
                    <li><a class="ps-header__item open-search" href="{{route('login')}}"><i class="icon-magnifier"></i></a></li>
                    <a class="" href="{{route('login')}}">Sign in</a> 
                    @else 
                    <li >
                        <a   class="ps-header__item" style="width:120px; font-size:0.85em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('users.account.index')}}" > 
                        <i class="icon-user"  style="font-size:0.95em; padding-right:2px; font-weight:800; background:#eef"></i>{{ucfirst(auth_user()->first_name)}} {{ucfirst(auth_user()->last_name)}} </a>
                    </li>
                    @endguest
                    {{-- <a class="" href="javascript:void(0);">Sign up</a> --}}
                    <li><a class="ps-header__item" href="{{route('carts.index')}}" id="cart-mini"><i class="icon-cart-empty"></i> <span class="badge cartReload" >{{Cart::count()}}</span></a></li>
                </ul>
                <div class="ps-header__search">
                    <form action="{{route('products.search')}}" method="get">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"  name="q" placeholder="Search for business card, resume template, business spreadsheet template, and more...">
                                <div class="input-group-append"><button type="submit" style="border:none; background:none"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
  @include('partials.nav')
</header>