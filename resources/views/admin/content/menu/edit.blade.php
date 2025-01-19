@extends('admin.layouts.master')

@section('title', 'ویرایش منو')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش منو
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.content.menu.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.content.menu.update', $menu) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12 mb-2">
                            <label for="name" class="form-label">اسم</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name', $menu->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="url" class="form-label">آدرس</label>
                            <input type="text" name="url" class="form-control" id="url"
                                value="{{ old('url', $menu->url) }}">
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="parent_id" class="form-label">منوی والد</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="" selected>منوی اصلی</option>
                                @foreach($parents as $parent)
                                <option value="{{ $parent->id }}" @selected(old('parent_id', $menu->parent_id) == $parent->id)>{{ $parent->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
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
