@extends('admin.layouts.master')

@section('title', 'کامنت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                کامنت ها
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد کامنت ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.content.comment.index') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">کامنت</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">پاسخ</th>
                    <th scope="col">نظر برای مدل</th>
                    <th scope="col">نام</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">زمان</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ Str::limit($comment->body, 20) }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                        {{ $comment->parent_id ? Str::limit($comment->parent->body, 20) : 'نظر اصلی' }}
                    </td>
                    <td>
                        @if($comment->commentable_type === 'App\Models\Market\Product')
                        {{ 'محصول' }}
                        @else
                        {{ 'بلاگ' }}
                        @endif
                    </td>
                    <td>
                        @if($comment->commentable_type === 'App\Models\Market\Product')
                        {{ $comment->commentable->name }}
                        @else
                        {{ $comment->commentable->title }}
                        @endif
                    </td>
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


                            <div class="mx-2">
                                <a href="{{ route('admin.content.comment.show', $comment) }}"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </section>
</section>

@endsection