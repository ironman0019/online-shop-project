@extends('admin.layouts.master')

@section('title', 'ویرایش دسته بندی تیکت')


@section('content')



<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>
                        ویرایش دسته بندی تیکت
                    </h5>

                </div>
                <div>
                    <a href="{{ route('admin.tickets.ticket-category.index') }}" class="btn btn-warning">بازگشت</a>
                </div>
            </section>
            <section class="body-content">

                <form class="row g-3" action="{{ route('admin.tickets.ticket-category.update', $ticketCategory) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">نام</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name', $ticketCategory->name) }}">
                        @error('name')
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