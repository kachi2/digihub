<section class="ps-section--banner ps-banner--container">
    <div class="ps-section__overlay">
        <div class="ps-section__loading"></div>
    </div>
    <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="4000"
        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
        data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        @forelse ($sliders as $slider)
            <div class="ps-banner" style="background:#306A53;">
                <div class="container-no-round">
                    <div class="ps-banner__block">
                        <div class="ps-banner__content">
                            <h2 class="ps-banner__title text-white">{{ $slider->title }}</h2>
                            <div class="ps-banner__desc text-white">{{ $slider->content }}</div>
                            <div class="ps-banner__btn-group">
                            </div>
                            <div class="ps-banner__persen bg-warning ps-left">
                    </div>
                        </div>
                         <div class="ps-banner__thumnail ps-banner__fluid">
                             <a style="position:inherit" href="{{route('products.search')}}">
                           <img class="ps-banner__image" src="{{$slider->image_path}}" alt="{{$slider->image_path}}" />
                             </a>
                        </div>
                  
                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div>

  
</section>