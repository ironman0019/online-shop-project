@extends('app.layouts.master')

@section('content')

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>
                        ساخت ادرس
                    </h5>

                </div>
                <div>
                    <a href="{{ route('home') }}" class="btn btn-warning">بازگشت</a>
                </div>
            </section>
            <section class="body-content">

                <form class="row g-3" action="{{ route('address.store') }}" method="post">
                    @csrf

                    <div class="col-md-6 mb-2">
                        <label for="address" class="form-label">ادرس کامل</label>
                        <input type="text" name="address" class="form-control" id="address"
                            value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="postal_code" class="form-label">کد پستی</label>
                        <input type="text" name="postal_code" class="form-control" id="postal_code"
                            value="{{ old('postal_code') }}">
                        @error('postal_code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="city_id" class="form-label">شهر</label>
                        <select class="form-control" name="city_id" id="city_id">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if (old('city_id') == $city->id) selected @endif>{{ $city->city }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
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