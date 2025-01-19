@extends('admin.layouts.master')

@section('title', 'پاسخ ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                پاسخ های کامنت شماره : {{ $comment->id }}
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد پاسخ های کامنت به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">کامنت</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">زمان</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ Str::limit($comment->body, 20) }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                        @if ($comment->status == 0)
                        <span> دیده نشده</span>
                        @elseif($comment->status == 1)
                        <span>دیده شده</span>
                        @else
                        <span>تایید شده</span>
                        @endif
                    </td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A, %d %B %y') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($comment->status == 0 || $comment->status == 1)
                            <div class="mx-2">
                                <a href="{{ route('admin.content.comment.approved', $comment) }}"
                                    class="text-success">
                                    <i class="fa fa-check"></i>
                                </a>
                            </div>
                            @else
                            <div class="mx-2">
                                <a href="{{ route('admin.content.comment.approved', $comment) }}"
                                    class="text-danger">
                                    <i class="fa fa-ban"></i>
                                </a>
                            </div>
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </section>
</section>

@endsection