<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') {{ config('app.name') }} | @lang('admin.control') @lang('admin.panel')</title>

<link rel="stylesheet" href="{{ _asset('css/app.css') }}">
<link rel="stylesheet" href="{{ _asset('mazer/css/main/app.css') }}">
<link rel="stylesheet" href="{{ _asset('mazer/css/main/app-dark.css') }}">
<link rel="shortcut icon" href="{{ _asset('mazer/img/logo/favicon.svg') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ _asset('mazer/img/logo/favicon.png') }}" type="image/png">

@yield('styles')
@yield('head-scripts')

@livewireStyles
