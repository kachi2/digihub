<div class="ps-navigation">
    <div class="container">
        <div class="ps-navigation__left">
            <nav class="ps-main-menu">
                <ul class="menu">
                    <li class="has-mega-menu"><a href="{{route('products.search')}}" style=""> <i class="fa fa-bars"></i>All Categories<span class="sub-toggle"></span></a>
                     <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">
                                        @forelse ($site_categories->take(6) as $categories)
                                        <div class="mega-menu__column">
                                            <p style="font-size: 14px; font-weight:bold">{{$categories->name}}</p>
                                            <ul class="sub-menu--mega">
                                                <li><a href="promo-category.html">Promo Category</a></li>
                                                <li><a href="category-grid.html">Grid</a></li>
                                                <li><a href="category-grid-detail.html">Grid with details</a></li>
                                                <li><a href="category-grid-green.html">Grid with header green</a></li>
                                                <li><a href="category-grid-dark.html">Grid with header dark</a></li>
                                                <li><a href="category-grid-separate.html">Grid separate</a></li>
                                                <li><a href="category-list.html">List</a></li>
                                                <li><a href="category-loading-infinity.html">Loading Infinity</a></li>
                                                <li><a href="category-load-more.html">Load more button</a></li>
                                            </ul>
                                        </div>
                                        @empty 
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        @forelse($site_category->take(6) as $menu)
                        <li class="has-mega-menu"><a href="{{route('products.search')}}" style="">{{$menu->name}}<span class="sub-toggle"></span></a>
                         {{-- <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">
                                        <div class="mega-menu__column col-12 col-md-4 col-sm-5" style="max-height: 400px">
                                            <ul class="sub-menu--mega sub-menu--bold">
                                                @forelse ($site_categories as $categories)
                                                <li><a href="category-list.html">{{$categories->name}}</a></li>
                                                @empty 
                                                @endforelse
                                                
                                            </ul>
                                        </div>
                                        <div class="mega-menu__column col-sm-5 col-md-4">
                                            <div class="ps-promo">
                                                <div class="ps-promo__item"><img class="ps-promo__banner" src="{{asset('images/category/'.$menu->image_path)}}" alt="alt" />
                                                
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mega-menu__column col-sm-3 col-md-3">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </li>  --}}
                        @empty
                        @endforelse
                </ul>
            </nav>
        </div>
    </div>
</div>