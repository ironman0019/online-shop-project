@extends('admin.layouts.master')

@section('title', 'گالری عکس محصولات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                گالری عکس محصولات
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد عکس محصولات به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.market.product-image.create', $product) }}" class="btn btn-success">ساخت</a>
            <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning">بازگشت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عکس</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">تاریخ ساخت</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productImages as $productImage)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset($productImage->image) }}" alt="image" class="img-fluid" width="100" height="100">
                    </td>
                    <td>{{ $productImage->product->name }}</td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge($productImage->created_at)->format('%A, %d %B %y')}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.market.product-image.destroy', $productImage) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.market.product-image.edit', [$productImage, $product]) }}"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </section>
</section>

@endsection