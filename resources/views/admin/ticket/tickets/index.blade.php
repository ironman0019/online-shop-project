@extends('admin.layouts.master')

@section('title', 'تیکت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تیکت ها 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تیکت ها به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
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
                @foreach ($tickets as $ticket)
                <tr>
                    <th>{{ $loop->iteration }}</th>
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
                            <div class="mx-2">
                                <a href="{{ route('admin.tickets.ticket.show', $ticket) }}"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            @if($ticket->parent_id == null)
                                <div class="mx-2">
                                    <a href="{{ route('admin.tickets.ticket.status', $ticket) }}"
                                        class="text-info">
                                        <i class="fa {{ $ticket->status ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
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

    </section>
</section>

@endsection