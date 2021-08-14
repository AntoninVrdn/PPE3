<!DOCTYPE html>
<html lang="en">


    @include('layout.head')
    <script type="text/javascript" src="{{asset ('js/fonctions.js')}}"></script>
    <link rel="stylesheet" href="{{asset ('css/Navbar.css')}}">
    @yield('Style')
    <body>
            @include('layout.header')


            @yield('content')
    </body>
</html>
