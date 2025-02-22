<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('app.layouts.head-tag')
</head>
<body>

    @include('app.layouts.partials.header')

    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->

    @include('app.layouts.partials.footer')


    @include('app.layouts.scripts')
</body>
</html>