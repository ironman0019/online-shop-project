@extends('admin.layouts.master')

@section('title', 'دسته بندی تیکت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                دسته بندی تیکت ها 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد دسته بندی تیکت ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.tickets.ticket-category.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticketCategories as $ticketCategory)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $ticketCategory->name }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.tickets.ticket-category.destroy', $ticketCategory) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.tickets.ticket-category.edit', $ticketCategory) }}"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
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