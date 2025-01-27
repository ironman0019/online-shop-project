@extends('admin.layouts.master')

@section('title', 'پرداخت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5> 
                پرداخت ها 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد پرداخت ها به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">مبلغ</th>
                    <th scope="col">آیدی یا شماره موبایل</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">درگاه</th>
                    <th scope="col">کد پرداخت</th>
                    <th scope="col">کد پیگیری</th>
                    <th scope="col">زمان ثبت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peyments as $peyment)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ number_format($peyment->amount) }}</td>
                    <td>{{ $peyment->user->mobile ? $peyment->user->mobile : $peyment->user->id }}</td>
                    <td>
                        @if($peyment->status == 0)
                            در انتظار پرداخت
                        @elseif($peyment->status == 1)
                            پرداخت شده
                        @else
                            پرداخت ناموفق
                        @endif
                    </td>
                    <td>{{ $peyment->gateway }}</td>
                    <td>{{ $peyment->transaction_id }}</td>
                    <td>{{ $peyment->tracking_code }}</td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge($peyment->created_at)->format('%A, %d %B %y')  }}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div>
            {{ $peyments->links() }}
        </div>

    </section>
</section>

@endsection