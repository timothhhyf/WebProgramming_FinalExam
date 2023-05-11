@extends('master.template')

@section('title', 'Login')

@section('content')

    @if ($errors->any())
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$errors->first()}}
        </div>
    @endif

    @if (session('success'))
        <script>
            window.alert("{{ session('success') }}");
        </script>
    @endif

    <div id="login-content">
        <h1>Login</h1>
        <form action="{{url('/login/Auth')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div id="login-form">
                <div class="form-group">
                    <label for="Email">Email Address :</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="Password">{{__('msg.Password')}} :</label>
                    <input type="password" name="password">
                </div>
            </div>
            <div class="submit-btn">
                <button type="submit" class="btn-submit">Submit</button>
                <a href="/register">{{__('Dont have an account? click here to sign up')}}</a>
            </div>
        </form>
    </div>

@endsection
