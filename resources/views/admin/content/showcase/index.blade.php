@extends('admin.layouts.master')

@section('title', 'بنر اصلی سایت')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                بنر های اصلی سایت (show cases)
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد بنر ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.content.showcase.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عکس</th>
                    <th scope="col">آدرس</th>
                    <th scope="col">جایگاه</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($showcases as $showcase)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset($showcase->image) }}" alt="image" class="img-fluid" width="100" height="100">
                    </td>
                    <td>{{ $showcase->url }}</td>
                    <td>
                        @if ($showcase->position == 0)
                        <span>اسلاید شو اصلی</span>
                        @elseif($showcase->position == 1)
                        <span>چپ بالا</span>
                        @else
                        <span>چپ پایین</span>
                        @endif
                    </td>
                    <td>
                        @if ($showcase->status)
                        <span> فعال</span>
                        @else
                        <span>غیر فعال</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.content.showcase.destroy', $showcase) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.content.showcase.edit', $showcase) }}"
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