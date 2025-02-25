<!-- start header -->
<header class="header mb-4">


    <!-- start top-header logo, searchbox and cart -->
    <section class="top-header">
        <section class="container-xxl ">
            <section class="d-md-flex justify-content-md-between align-items-md-center py-3">

                <section class="d-flex justify-content-between align-items-center d-md-block">
                    <a class="text-decoration-none" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/8.png') }}"
                            alt="logo"></a>
                    <button class="btn btn-link text-dark d-md-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa fa-bars me-1"></i>
                    </button>
                </section>

                <section class="mt-3 mt-md-auto search-wrapper">
                    <section class="search-box">
                        <section class="search-textbox">
                            <span><i class="fa fa-search"></i></span>
                            <input id="search" type="text" class="" placeholder="جستجو ..."
                                autocomplete="off">
                        </section>
                        <section class="search-result visually-hidden">
                            <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                    شیا"</span><span class="search-result-type">در دسته بندی ها</span></section>
                            <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                        class="fa fa-link"></i> دسته موبایل و وسایل جانبی</a></section>

                            <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                    شیا"</span><span class="search-result-type">در برندها</span></section>
                            <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                        class="fa fa-link"></i> برند شیائومی</a></section>
                            <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                        class="fa fa-link"></i> برند توشیبا</a></section>
                            <section class="search-result-item"><a class="text-decoration-none" href="#"><i
                                        class="fa fa-link"></i> برند شیانگ پینگ</a></section>

                            <section class="search-result-title">نتایج جستجو برای <span class="search-words">"موبایل
                                    شیا"</span><span class="search-result-type">در کالاها</span></section>
                            <section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span>
                            </section>
                        </section>
                    </section>
                </section>

                <section class="mt-3 mt-md-auto text-end">
                    <section class="d-inline px-md-3">
                        <button class="btn btn-link text-decoration-none text-dark dropdown-toggle profile-button"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </button>
                        <section class="dropdown-menu dropdown-menu-end custom-drop-down"
                            aria-labelledby="dropdownMenuButton1">
                            <section><a class="dropdown-item" href="my-profile.html"><i
                                        class="fa fa-user-circle"></i>پروفایل کاربری</a></section>
                            <section><a class="dropdown-item" href="{{ route('profile.my-orders') }}"><i
                                        class="fa fa-newspaper"></i>سفارشات</a></section>
                            <section><a class="dropdown-item" href="my-favorites.html"><i class="fa fa-heart"></i>لیست
                                    علاقه مندی</a></section>
                            <section>
                                <hr class="dropdown-divider">
                            </section>
                            <section><a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i>خروج</a>
                            </section>

                        </section>
                    </section>
                    <section class="header-cart d-inline ps-3 border-start position-relative">
                        <a class="btn btn-link position-relative text-dark header-cart-link" href="javascript:void(0)">
                            <i class="fa fa-shopping-cart"></i> 
                                @if($cartItemCount)
                                <span style="top: 80%;"
                                class="position-absolute start-0 translate-middle badge rounded-pill bg-danger">
                                {{ $cartItemCount }}
                                </span>
                                @endif
                        </a>
                        <section class="header-cart-dropdown">
                            <section class="border-bottom d-flex justify-content-between p-2">
                                <span class="text-muted">{{$cartItemCount }} کالا</span>
                                <a class="text-decoration-none text-info" href="{{ route('cart') }}">مشاهده سبد خرید </a>
                            </section>
                            <section class="header-cart-dropdown-body">
                                @if(auth()->check() && $cart)
                                @foreach($cart->cartItems as $item)
                                <section
                                    class="header-cart-dropdown-body-item d-flex justify-content-start align-items-center">
                                    <img class="flex-shrink-1" src="{{ $item->product->image }}" alt="product_image">
                                    <section class="w-100 text-truncate"><a class="text-decoration-none text-dark"
                                            href="{{ route('product.show', [$item->product, $item->product->slug]) }}">{{ $item->product->name }}</a>
                                    </section>
                                </section>
                                @endforeach
                                @endif

                            </section>
                            <section
                                class="header-cart-dropdown-footer border-top d-flex justify-content-between align-items-center p-2">
                                <section class="">
                                    <section>مبلغ قابل پرداخت</section>
                                    <section> {{ number_format($cartTotalPrice) }} تومان</section>
                                </section>
                                <section class="">
                                        <a class="btn btn-danger btn-sm d-block" href="{{ route('checkout') }}">ثبت
                                        سفارش</a>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end top-header logo, searchbox and cart -->


    <!-- start menu -->
    <nav class="top-nav">
        <section class="container-xxl ">
            <nav class="">
                <section class="d-none d-md-flex justify-content-md-start position-relative">

                    @foreach ($menus as $menu)
                        <section class="navbar-item"><a href="{{ $menu->url }}">{{$menu->name}}</a></section>
                    @endforeach

                </section>


                <!--mobile view-->
                <section class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel" style="z-index: 9999999;">
                    <section class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><a class="text-decoration-none"
                                href="index.html"><img src="assets/images/logo/8.png" alt="logo"></a></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </section>
                    <section class="offcanvas-body">

                        <section class="navbar-item"><a href="#">سوپرمارکت</a></section>
                        <section class="navbar-item"><a href="#">تخفیف ها و پیشنهادها</a></section>
                        <section class="navbar-item"><a href="#">آمازون من</a></section>
                        <section class="navbar-item"><a href="#">آمازون پلاس</a></section>
                        <section class="navbar-item"><a href="#">درباره ما</a></section>
                        <section class="navbar-item"><a href="#">فروشنده شوید</a></section>
                        <section class="navbar-item"><a href="#">فرصت های شغلی</a></section>


                        <hr class="border-bottom">
                        <section class="navbar-item"><a href="javascript:void(0)">دسته بندی</a></section>
                        <!-- start sidebar nav-->
                        <section class="sidebar-nav mt-2 px-3">
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">کالای دیجیتال <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">خودرو ابزار و تجهیزات صنعتی <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">مد و پوشاک <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">اسباب بازی، کودک و نوزاد <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">کالاهای سوپرمارکتی <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">زیبایی و سلامت <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">خانه و آشپزخانه <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">کتاب، لوازم تحریر و هنر <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">ورزش و سفر <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">محصولات بومی و محلی <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="sidebar-nav-sub-item">
                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی
                                                موبایل</a><i class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a>
                                            </section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب
                                                    موبایل</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر
                                                    نگهدارنده</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر
                                                    بیسیم</a></section>
                                            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>

                        </section>
                        <!--end sidebar nav-->



                    </section>
                </section>

            </nav>
        </section>
    </nav>
    <!-- end menu -->


</header>
<!-- end header -->
