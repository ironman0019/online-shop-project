@extends('admin.layouts.master')

@section('title', 'ویرایش محصول')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش محصول
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.market.product.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="product_category_id" class="form-label">دسته بندی محصول</label>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('product_category_id', $product->product_category_id) == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('product_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea name="description" class="form-control" id="description" rows="10" cols="30"
                                value="">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="weight" class="form-label">وزن</label>
                            <input type="number" name="weight" class="form-control" id="weight"
                                value="{{ old('weight', $product->weight) }}">
                            @error('weight')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="length" class="form-label">طول</label>
                            <input type="number" name="length" class="form-control" id="length"
                                value="{{ old('length', $product->length) }}">
                            @error('length')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="width" class="form-label">عرض</label>
                            <input type="number" name="width" class="form-control" id="width"
                                value="{{ old('width', $product->width) }}">
                            @error('width')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="height" class="form-label">ارتفاع</label>
                            <input type="number" name="height" class="form-control" id="height"
                                value="{{ old('height', $product->height) }}">
                            @error('height')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="price" class="form-label">قیمت</label>
                            <input type="number" name="price" class="form-control" id="price"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="tags" class="form-label">تگ ها</label>
                            <input type="text" name="tags" class="form-control" id="tags"
                                value="{{ old('tags', $product->tags) }}">
                            @error('tags')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="marketable_number" class="form-label">موجودی</label>
                            <input type="number" name="marketable_number" class="form-control" id="marketable_number"
                                value="{{ old('marketable_number', $product->marketable_number) }}">
                            @error('marketable_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="marketable" class="form-label">وضعیت فروش</label>
                            <select class="form-control" name="marketable" id="marketable">
                                <option value="1" @if (old('marketable', $product->marketable) == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('marketable', $product->marketable) == 0) selected @endif>غیر فعال</option>
                            </select>
                            @error('marketable')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if (old('status', $product->status) == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('status', $product->status) == 0) selected @endif>غیر فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="brand_id" class="form-label">برند</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->persian_name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">عکس محصول</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image', $product->iamge) }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2 mt-3">
                            <img src="{{ asset($product->image) }}" alt="current_image" class="img-fluid" width="200" height="200">
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
