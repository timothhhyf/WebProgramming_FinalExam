<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- everything link that is needed --}}
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    {{-- navbar --}}
    <nav id="navbar">
        <div id="navbar-main">
            <a href="/"><h1>Amazing E-Grocery</h1></a>
            <div id="register-login-btn">
                @if (Auth::Check())
                    <a href="/logout">{{__('msg.Logout')}}</a>
                @else
                    <a href="/register">{{__('msg.Register')}}</a>
                    <a href="/login">{{__('msg.Login')}}</a>
                @endif
            </div>
        </div>
        @if (Auth::check())
            <div id="navbar-loggedin">
                @if (Auth::user()->role_id == 2)
                    <a href="/home?page=1">{{__('msg.Home')}}</a>
                    <a href="/cart">{{__('msg.Cart')}}</a>
                    <a href="/profile">{{__('msg.Profile')}}</a>
                @else
                    <a href="/home?page=1">{{__('msg.Home')}}</a>
                    <a href="/cart">{{__('msg.Cart')}}</a>
                    <a href="/profile">{{__('msg.Profile')}}</a>
                    <a href="/accountMaintenance">{{__('msg.Account Maintenance')}}</a>
                @endif
            </div>
        @endif
    </nav>

    {{-- content --}}
    @yield('content')

    {{-- footer --}}

    <footer id="footer">
        <h6>&#169; Amazing E-Grocery 2023</h6>
    </footer>

</body>
</html>
