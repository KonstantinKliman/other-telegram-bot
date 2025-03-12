<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
@stack('styles')
<body>
<div class="d-flex flex-column vh-100">
    <header>
        @include('includes.header')
    </header>
    <main class="flex-grow-1">
        @yield('main')
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</div>
@stack('js')
</body>
</html>
