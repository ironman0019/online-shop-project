@extends('admin.layouts.master')

@section('title', 'ویرایش کد تخفیف')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')



<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>
                        ویرایش کد تخفیف
                    </h5>

                </div>
                <div>
                    <a href="{{ route('admin.market.coupan.index') }}" class="btn btn-warning">بازگشت</a>
                </div>
            </section>
            <section class="body-content">

                <form class="row g-3" action="{{ route('admin.market.coupan.update', $coupan) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6 mb-2">
                        <label for="code" class="form-label">کد</label>
                        <input type="text" name="code" class="form-control" id="code"
                            value="{{ old('code', $coupan->code) }}">
                        @error('code')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="amount" class="form-label">مقدار</label>
                        <input type="number" name="amount" class="form-control" id="amount"
                            value="{{ old('amount', $coupan->amount) }}">
                        @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-2">
                        <label for="amount_type" class="form-label">نوع تخفیف</label>
                        <select class="form-control" name="amount_type" id="amount_type">
                            <option value="1" @if (old('amount_type', $coupan->amount_type)==1) selected @endif>عددی</option>
                            <option value="0" @if (old('amount_type', $coupan->amount_type)==0) selected @endif>درصدی</option>
                        </select>
                        @error('amount_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="discount_ceiling" class="form-label">سقف تخفیف (فقط در صورت درصدی بودن تخفیف)</label>
                        <input type="number" name="discount_ceiling" class="form-control" id="discount_ceiling"
                            value="{{ old('discount_ceiling', $coupan->discount_ceiling) }}">
                        @error('discount_ceiling')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="start_date" class="form-label">تاریخ شروع</label>
                        <input type="text" class="form-control" id="start_date" name="start_date">
                        <input type="text" class="form-control" id="start_date_view">
                        @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="end_date" class="form-label">تاریخ پایان</label>
                        <input type="text" class="form-control" id="end_date" name="end_date">
                        <input type="text" class="form-control" id="end_date_view">
                        @error('end_date')
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

@section('scripts')
@parent
<script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $("#start_date_view").persianDatepicker({
        altField: '#start_date',
        format: "YYYY/MM/DD",
        autoClose: true,
    }),

    $("#end_date_view").persianDatepicker({
        altField: '#end_date',
        format: "YYYY/MM/DD",
        autoClose: true
    });

  });
</script>
@endsection