<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(Auth::check())
    <meta name="temp-user" content="{{Auth::user()->getKey()}}">
@endif

<title>{{ config('app.name', 'Laravel') }}</title>


<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

