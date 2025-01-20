@extends('admin.layouts.master')

@section('title', 'نمایش محصول')

@section('content')



<section class="pt-3 pb-1 mb-2 border-bottom ">
    <h1 class="h5 ">نمایش محصول</h1>
</section>

<section class="row my-3 ">
    <section class="col-12 ">
        <p class="h4 border-bottom mb-3">نام : {{ $product->name }}</p>
        <p class="h5 border-bottom mb-3">توضیحات : {{ $product->description }}</p>
        <p class="h4 border-bottom mb-3">اسلاگ : {{ $product->slug ??  'خالی' }}</p>
        <p class="h4 border-bottom mb-3">عکس : <span><img src="{{ asset($product->image) }}" alt="image" class="img-fluid" width="200" height="200"></span></p>
        <p class="h4 border-bottom mb-3">وزن : {{ $product->weight ?? 'خالی' }}</p>
        <p class="h4 border-bottom mb-3">طول : {{ $product->length ?? 'خالی' }}</p>
        <p class="h4 border-bottom mb-3">عرض : {{ $product->width ?? 'خالی' }}</p>
        <p class="h4 border-bottom mb-3">ارتفاع : {{ $product->height ?? 'خالی' }}</p>
        <p class="h4 border-bottom mb-3">قیمت : {{ number_format($product->price) }}</p>
        <p class="h4 border-bottom mb-3">تگ ها : {{ $product->tags }}</p>
        <p class="h4 border-bottom mb-3">تعداد فروش : {{ $product->sold_number }}</p>
        <p class="h4 border-bottom mb-3">تعداد قابل فروش : {{ $product->marketable_number }}</p>
        <p class="h4 border-bottom mb-3">وضعیت فروش محصول : {{ $product->marketable == 0 ? 'غیر فعال' : 'فعال' }}</p>
        <p class="h4 border-bottom mb-3">وضعیت خود محصول : {{ $product->status == 0 ? 'غیر فعال' : 'فعال' }}</p>
        <p class="h4 border-bottom mb-3">برند : {{ $product->brand->persian_name }}</p>
        <p class="h4 border-bottom mb-3">دسته بندی : {{ $product->productCategory->name }}</p>
        <p class="h4 border-bottom mb-3">تاریخ ساخت : {{ \Morilog\Jalali\Jalalian::forge($product->created_at)->format('%A, %d %B %y') }}</p>
        <div>
            <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning">بازگشت</a>
        </div>
    </section>
</section>




@endsection