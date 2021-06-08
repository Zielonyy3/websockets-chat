<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
<div id="app">
    @include('layouts.navbar')
    <main class="py-4">
        @yield('content')
    </main>
</div>

@yield('modals')
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
