<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel Ecommerce | @yield('title', '')</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('/js/jquery.js') }}" ></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('toastr/toastr.min.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
    @include('partials.nav')


    <div class="">
        @include('partials.error')

       
   </div>
<main class="py-4">
           @yield('content')
       </main>
  
    @include('partials.footer')

    @yield('extra-js')

</body>
</html>
