<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials._head')
</head>

<body class="theme-{{ $darkmode ? 'dark' : 'light' }}">
    <div id="app">
        @include('partials._sidebar')
        
        <div id="main">
            <header class="mb-3">
                <a href="javascript:void(0)" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            @yield('content')

            @include('partials._footer')
        </div>
    </div>

    @include('partials._scripts')
    @include('partials._messages')
</body>

</html>
