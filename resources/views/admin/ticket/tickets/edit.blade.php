@extends('admin.layouts.master')

@section('title', 'ویرایش  تیکت')


@section('content')



<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>
                        ویرایش  تیکت
                    </h5>

                </div>
                <div>
                    <a href="{{ route('admin.tickets.ticket.index') }}" class="btn btn-warning">بازگشت</a>
                </div>
            </section>
            <section class="body-content">

                <form class="row g-3" action="{{ route('admin.tickets.ticket.update', $ticket) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12 mb-2">
                        <label for="body" class="form-label">متن</label>
                        <input type="text" name="body" class="form-control" id="body"
                            value="{{ old('body', $ticket->body) }}">
                        @error('body')
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