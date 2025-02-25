@extends('app.layouts.master')

@section('title', 'صفحه اصلی')

@section('content')
    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    @foreach($showcaseSlideshows as $showcaseSlideshow)
                    <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="{{ $showcaseSlideshow->url }}"><img
                                class="w-100 rounded-2 d-block h-auto" src="{{ $showcaseSlideshow->image }}" alt="pic"></a>
                    </section>
                    @endforeach
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                <section class="mb-2"><a href="{{ $showcaseLeftTop->url }}" class="d-block"><img class="w-100 rounded-2"
                            src="{{ $showcaseLeftTop->image }}" alt=""></a></section>
                <section class="mb-2"><a href="{{ $showcaseLeftBottom->url }}" class="d-block"><img class="w-100 rounded-2"
                            src="{{ $showcaseLeftBottom->image }}" alt=""></a></section>
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach($mostViewedProducts as $mostViewedProduct)
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="افزودن به سبد خرید"><i
                                                        class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="{{ route('product.show', [$mostViewedProduct, $mostViewedProduct->slug]) }}">
                                                <section class="product-image">
                                                    <img class="" src="{{ $mostViewedProduct->image }}" alt="pic" width="250px" height="200px">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name">
                                                    <h3>{{ Str::limit($mostViewedProduct->name, 30) }}</h3>
                                                </section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">{{ number_format($mostViewedProduct->price) }} تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                <section class="col-12 col-md-6 mt-2 mt-md-0"><a href="{{ $adsBannerTopRight->url }}"><img class="d-block rounded-2 w-100"
                        src="{{ $adsBannerTopRight->image }}" alt="pic"></a></section>
                <section class="col-12 col-md-6 mt-2 mt-md-0"><a href="{{ $adsBannerTopLeft->url }}"><img class="d-block rounded-2 w-100"
                        src="{{ $adsBannerTopLeft->image }}" alt="pic"></a></section>
            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach($suggestionProducts as $suggestionProduct)
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                            </section>
                                            <section class="product-add-to-favorite"><a href="#"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="{{ route('product.show', [$suggestionProduct, $suggestionProduct->slug]) }}">
                                                <section class="product-image">
                                                    <img class="" src="{{ $suggestionProduct->image }}"
                                                        alt="product_image" width="250px" height="200px">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name">
                                                    <h3>{{ $suggestionProduct->name }}</h3>
                                                </section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">{{ number_format($suggestionProduct->price) }} تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- one column -->
            <section class="row py-4">
                <section class="col"><a href="{{ $adsBannerBottom->url }}"><img class="d-block rounded-2 w-100" src="{{ $adsBannerBottom->image }}"
                        alt="pic" width="400px" height="250px"></a></section>
            </section>

        </section>
    </section>
    <!-- end ads section -->



    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach($brands as $brand)
                            <section class="item">
                                <section class="brand-item">
                                    <a href="#"><img class="rounded-2" src="{{ $brand->logo }}"
                                            alt="brand_image"></a>
                                </section>
                            </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->



@endsection
