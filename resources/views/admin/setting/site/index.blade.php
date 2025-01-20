@extends('admin.layouts.master')

@section('title', 'تنظیمات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تنظیمات
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تنظیمات سایت به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.setting.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">
        @if($setting)
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">کلمات کلیدی</th>
                    <th scope="col">لوگو</th>
                    <th scope="col">ایکون</th>
                    <th scope="col">زمان ویرایش</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th>1</th>
                    <td>{{ $setting->title }}</td>
                    <td>{{ Str::limit($setting->description, 50) }}</td>
                    <td>{{ Str::limit($setting->keywords, 50) }}</td>
                    <td><img src="{{ asset($setting->logo) }}" alt="logo" width="100" height="100"></td>
                    <td><img src="{{ asset($setting->icon) }}" alt="icon" width="100" height="100"></td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge($setting->updated_at)->format('%A, %d %B %y') }}</td>
                </tr>
                


            </tbody>
        </table>
        @else
        <h4>تنظیمات وجود ندارد. برای ساخت کیلیک کنید.</h4>
        @endif


    </section>
</section>

@endsection