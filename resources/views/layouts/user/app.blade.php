<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ENV('APP_NAME') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('library/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('library/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/custom.css')}}">
</head>

<body>
    @include('layouts.user.main.header')
    @include('layouts.user.main.nav')
    @yield('content')
    @include('layouts.user.main.footer')
</body>
<script>
    
</script>
<script src="{{asset('library/jquery/dist/jquery.min.js')}}"></script>
@stack('customScript')
</html>
