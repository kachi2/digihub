<div class="ps-navigation">
    <div class="container">
        <div class="ps-navigation__left">
            <nav class="ps-main-menu">
                <ul class="menu">
                    <li class="has-mega-menu"><a href="{{route('products.search')}}" style=""> <i class="fa fa-bars"></i>All Categories<span class="sub-toggle"></span></a>
                        </li>
                        @forelse($site_category->take(6) as $menu)
                        <li class="has-mega-menu"><a href="{{route('products.search')}}" style="">{{$menu->name}}<span class="sub-toggle"></span></a>
                          {{-- <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">
                                        <div class="mega-menu__column col-12 col-md-4 col-sm-5" style="max-height: 200px">
                                            <ul class="sub-menu--mega sub-menu--light">
                                                @forelse ($menu->products as $categories)
                                                <li ><a href="{{ route('users.products', [$categories->hashid, $categories->productUrl]) }}">{{$categories->name}}</a></li>
                                                @empty 
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="mega-menu__column col-sm-5 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner" src="{{$menu->image_path}}" alt="alt" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mega-menu__column col-sm-3 col-md-3">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> --}}
                        </li>  
                        @empty
                        @endforelse
                </ul>
            </nav>
        </div>
    </div>
</div>