@extends('app.layouts.master')

@section('title', 'سفارشات من')

@section('content')

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                @include('app.layouts.partials.profile-sidebar')
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">
                            <a class="btn btn-info btn-sm mx-1" href="{{ route('profile.my-orders', ['status' => 0]) }}">در انتظار پرداخت</a>
                            <a class="btn btn-warning btn-sm mx-1" href="{{ route('profile.my-orders', ['status' => 1]) }}">در حال پردازش</a>
                            <a class="btn btn-success btn-sm mx-1" href="{{ route('profile.my-orders', ['status' => 2]) }}">تحویل شده</a>
                            <a class="btn btn-danger btn-sm mx-1" href="{{ route('profile.my-orders', ['status' => 3]) }}">مرجوعی</a>
                            <a class="btn btn-dark btn-sm mx-1" href="{{ route('profile.my-orders', ['status' => 4]) }}">لغو شده</a>
                        </section>


                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    @if(request('status') == 1)
                                    در حال پردازش
                                    @elseif(request('status') == 2)
                                    تحویل شده
                                    @elseif(request('status') == 3)
                                    مرجوعی
                                    @elseif(request('status') == 4)
                                    لغو شده
                                    @else
                                    در انتظار پرداخت
                                    @endif

                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">
                            @foreach($orders as $order)
                            <section class="order-item">
                                <section class="d-flex justify-content-between">
                                    <section>
                                        <section class="order-item-date"><i class="fa fa-calendar-alt"></i>{{ \Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %y') }}</section>
                                        <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش : {{ $order->id }}</section>
                                        <section class="order-item-status"><i class="fa fa-clock"></i>{{ $order->status_label }}</section>
                                        <section class="order-item-products mt-3">
                                            <table class="table table-borderd">
                                                <thead>
                                                    <tr>
                                                        <th>اسم</th>
                                                        <th>عکس</th>
                                                        <th>تعداد</th>
                                                        <th>قیمت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->orderItems as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td><img src="{{ $item->product->image }}" alt="product_pic" width="60px" height="60px"></td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->product->price }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            @endforeach


                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->


@endsection