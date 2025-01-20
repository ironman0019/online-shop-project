@extends('admin.layouts.master')

@section('title', 'ساخت عکس')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت عکس محصول
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.product-image.index', $product) }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.market.product-image.store', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">عکس</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image') }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="col-12">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>

                </section>
            </section>
        </section>
    </section>




@endsection
