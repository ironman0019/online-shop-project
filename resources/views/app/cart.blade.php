@extends('app.layouts.master')

@section('title', 'سبد خرید')

@section('content')

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>سبد خرید شما</span>
                            </h2>
                            @if(session('success') || session('error'))
                                <p class="alert @if(session('error')) alert-danger @else alert-success @endif">
                                    {{ session('success') ? session('success') : session('error') }}
                                </p>
                            @endif
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    @if(!$cart)
                        <p>سبد خرید شما خالی است</p>
                    @else
                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <section class="content-wrapper bg-white p-3 rounded-2">
                                @foreach($cart->cartItems as $item)
                                <section class="cart-item d-md-flex py-3">
                                    <section class="cart-img align-self-start flex-shrink-1"><img
                                            src="{{ $item->product->image }}" alt="product_pic"></section>
                                    <section class="align-self-start w-100">
                                        <p class="fw-bold">{{ $item->product->name }}</p>
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span>
                                                گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                        @if($item->product->marketable)
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود
                                                در انبار</span></p>
                                        @endif
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                @if($item->quantity > 1)
                                                <form action="{{ route('cart.decrease', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="cart-number-down" type="submit">-</button>
                                                </form>
                                                @endif
                                                
                                                <input class="" type="number" min="1" max="5"
                                                    step="1" value="{{ $item->quantity }}" readonly="readonly">
                                                
                                                <form action="{{ route('cart.add', $item->product->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="cart-number-up" type="submit">+</button>
                                                </form>
                                            </section>
                                            <form action="{{ route('cart.remove', $item->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-decoration-none ms-4 cart-delete btn btn-link" href="#"><i
                                                    class="fa fa-trash-alt"></i> حذف از سبد</button>
                                            </form>
                                        </section>
                                    </section>
                                    <section class="align-self-end flex-shrink-1">
                                        <section class="text-nowrap fw-bold">{{ number_format($item->product->price) }} تومان</section>
                                    </section>
                                </section>
                                @endforeach



                            </section>
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cart->cartItems->sum('quantity') }})</p>
                                    <p class="text-muted">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت
                                    سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید.
                                    نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این
                                    سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="{{ route('checkout') }}" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>

                            </section>
                        </section>
                    </section>
                    @endif
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->




@endsection
