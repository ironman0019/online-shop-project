@extends('admin.layouts.master')

@section('title', 'ساخت برند')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت برند
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.brand.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.market.brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" name="persian_name" class="form-control" id="name"
                                value="{{ old('persian_name') }}">
                            @error('persian_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام انگلیسی</label>
                            <input type="text" name="english_name" class="form-control" id="name"
                                value="{{ old('english_name') }}">
                            @error('english_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="logo" class="form-label">لوگو</label>
                            <input type="file" name="logo" class="form-control-file" id="logo"
                                value="{{ old('logo') }}">
                            @error('logo')
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
