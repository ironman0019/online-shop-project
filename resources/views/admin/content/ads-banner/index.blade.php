@extends('admin.layouts.master')

@section('title', 'بنر تبلیغاتی سایت')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                بنر های تبلیغاتی سایت (ads banners)
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد بنر های تبلیغاتی به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.content.ads-banner.create') }}" class="btn btn-success">ساخت</a>
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
                @foreach ($adsBanners as $adsBanner)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset($adsBanner->image) }}" alt="image" class="img-fluid" width="100" height="100">
                    </td>
                    <td>{{ $adsBanner->url }}</td>
                    <td>
                        @if ($adsBanner->position == 0)
                        <span>بالا راست</span>
                        @elseif($adsBanner->position == 1)
                        <span>بالا چپ</span>
                        @else
                        <span>پایین</span>
                        @endif
                    </td>
                    <td>
                        @if ($adsBanner->status)
                        <span> فعال</span>
                        @else
                        <span>غیر فعال</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.content.ads-banner.destroy', $adsBanner) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.content.ads-banner.edit', $adsBanner) }}"
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