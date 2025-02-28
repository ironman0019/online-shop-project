@extends('app.layouts.master')

@section('title', 'ادرس')

@section('content')
<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                ادرس ها
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد ادرس ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('address.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">شهر</th>
                    <th scope="col">ادرس</th>
                    <th scope="col">کد پستی</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $address->city->city }}</td>
                    <td>{{ $address->address }}</td>
                    <td>{{ $address->postal_code }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('address.destroy', $address) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
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