@extends('app.layouts.master')

@section('title', 'پرداخت')

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
                                <span>انتخاب نوع پرداخت </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            کد تخفیف
                                        </h2>
                                        @if(session('error'))
                                            <p class="alert alert-danger">{{ session('error') }}</p>
                                        @endif
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                @if($cart->discount_status)
                                    <section class="alert alert-success">
                                        <p>کد تخفیف اعمال شد - {{ $cart->coupan->code }}</p>
                                    </section>
                                @else
                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                    role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        کد تخفیف خود را در این بخش وارد کنید.
                                    </secrion>
                                </section>
                                <form action="{{ route('checkout.apply-discount') }}" method="post">
                                    @csrf
                                    <section class="row">
                                        <section class="col-md-5">
                                            <section class="input-group input-group-sm">
                                                <input type="text" class="form-control" placeholder="کد تخفیف را وارد کنید" name="code">
                                                <button class="btn btn-primary" type="submit">اعمال کد</button>
                                            </section>
                                            @error('code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </section>
                                    </section>
                                </form>
                                @endif

                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب روش ارسال
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="payment-select">

                                    {{-- <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                        role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            برای پیشگیری از انتقال ویروس کرونا پیشنهاد می کنیم روش پرداخت اینترنتی رو پرداخت
                                            کنید.
                                        </secrion>
                                    </section> --}}
                                    @foreach($deliveries as $delivery)
                                    <input type="radio" name="delivery_type" value="{{ $delivery->id }}" id="delivery_{{$delivery->id}}" />
                                    <label for="delivery_{{$delivery->id}}" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            {{ $delivery->name }} || {{ $delivery->delivery_time }} => {{ $delivery->delivery_time_unit }}
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            {{ number_format($delivery->amount) }}
                                        </section>
                                    </label>
                                    @endforeach

                                </section>
                            </section>




                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cart->cartItems->sum('quantity') }})</p>
                                    <p class="text-muted">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder">{{ number_format($cart->total_discount_price) }} تومان</p>
                                </section>


                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب
                                    می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bold">{{ number_format($cart->total_price - $cart->total_discount_price) }} تومان</p>
                                </section>

                                <section class="">
                                    <section id="payment-button"
                                        class="text-warning border border-warning text-center py-2 pointer rounded-2 d-block">
                                        نوع پرداخت را انتخاب کن</section>
                                    <a id="final-level" href="my-orders.html" class="btn btn-danger d-none">ثبت سفارش </a>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->




@endsection
