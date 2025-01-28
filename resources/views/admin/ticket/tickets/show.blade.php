@extends('admin.layouts.master')

@section('title', 'تیکت ')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تیکت
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تیکت به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">موضوع</th>
                    <th scope="col">متن</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تیکت ادمین</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">پاسخ به </th>
                    <th scope="col">تنظیمات</th>
                    <th scope="col">فایل</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ticket->children as $ticket)
                <tr>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ Str::limit($ticket->body, 50) }}</td>
                    <td>{{ $ticket->status ? 'بسته شده' : 'باز' }}</td>
                    <td>{{ $ticket->admin->user->name }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    <td>{{ $ticket->parent ? $ticket->parent->subject : 'تیکت اصلی' }}</td>
                    <td>
                    <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.tickets.ticket.destroy', $ticket) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            @if($ticket->parent_id != null)
                                <div class="mx-2">
                                    <a href="{{ route('admin.tickets.ticket.edit', $ticket) }}"
                                        class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </td>
                    @if($ticket->ticketFile)
                        <td><a href="{{ $ticket->ticketFile->file_path }}">دانلود</a></td>
                    @endif
                </tr>
                @endforeach


            </tbody>
        </table>

        <section class="body-content">

            <form class="row g-3" action="{{ route('admin.tickets.ticket.store') }}" method="post">
                @csrf

                <div class="col-md-12 mb-2">
                    <label for="body" class="form-label">نام</label>
                    <input type="text" name="body" class="form-control" id="body"
                        value="{{ old('body') }}">
                    @error('body')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <input type="hidden" name="parent_id" value="{{ $ticket->parent_id ? $ticket->parent_id : $ticket->id }}">


                <div class="col-12">
                    <button type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>

        </section>

    </section>
</section>

@endsection