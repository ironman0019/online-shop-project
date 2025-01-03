@extends('admin.layouts.master')

@section('title', 'ویرایش صفحه')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش صفحه
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.content.page.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.content.page.update', $page) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12 mb-2">
                            <label for="title" class="form-label">عنوان</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ old('title', $page->title) }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="body" class="form-label">بدنه</label>
                            <textarea name="body" class="form-control" id="answer"
                                value="">{{ old('body', $page->body) }}</textarea>
                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if (old('status', $page->status) == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('status', $page->status) == 0) selected @endif>غیر فعال</option>
                            </select>
                            @error('status')
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
