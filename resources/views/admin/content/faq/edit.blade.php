@extends('admin.layouts.master')

@section('title', 'ویرایش سوالات متداول')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش سوالات متداول
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.content.faq.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.content.faq.update', $faq) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12 mb-2">
                            <label for="question" class="form-label">سوال</label>
                            <input type="text" name="question" class="form-control" id="question"
                                value="{{ old('question', $faq->question) }}">
                            @error('question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="answer" class="form-label">جواب</label>
                            <textarea name="answer" class="form-control" id="answer"
                                value="">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if (old('status', $faq->status) == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('status', $faq->status) == 0) selected @endif>غیر فعال</option>
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
