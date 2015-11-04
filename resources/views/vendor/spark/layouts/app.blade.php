<!DOCTYPE html>
<html lang="en">
<head>
    @include('spark::layouts.common.head')
</head>
<body>
    <!-- Navigation -->
    @if (Auth::check())
        @include('spark::nav.authenticated')
    @else
        @include('spark::nav.guest')
    @endif

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('spark::common.footer')

    <!-- JavaScript Application -->
    <script src="{{ elixir('js/app.js') }}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::render() !!}
</body>
</html>
