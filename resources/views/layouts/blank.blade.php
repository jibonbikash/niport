<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
@yield('content')
@stack('script')
</body>
</html>
