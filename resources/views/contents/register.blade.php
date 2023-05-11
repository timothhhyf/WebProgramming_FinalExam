@extends('master.template')

@section('title', 'Register')

@section('content')

    @if ($errors->any())
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$errors->first()}}
        </div>
    @endif

    <div id="register-content">
        <h1>Register</h1>
        <form action="{{url('/register/createUser')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div id="register-form">
                <div id="register-first-col">
                    <div class="form-group">
                        <label for="FirstName">First Name :</label>
                        <input type="firstName" name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email :</label>
                        <input type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="Gender">Gender :</label>
                        <div style="width:175px;
                                    display: flex;
                                    justify-content: space-between;">
                            <input type="radio" name="optionGender" value="1"> <label for="Male">Male</label>
                            <input type="radio" name="optionGender" value="2"> <label for="Female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password :</label>
                        <input type="password" name="password">
                    </div>
                </div>
                <div id="register-second-col">
                    <div class="form-group">
                        <label for="LastName">Last Name :</label>
                        <input type="lastNAme" name="lastName">
                    </div>
                    <div class="form-group">
                        <label for="Role">Role :</label>
                        <select name="role" id="" style="width:175px;">
                            <option value="" selected></option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="displayPicture">Display Picture :</label>
                        <input type="file" name="displayPicture" id="displayPicture" style="width:175px;">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password :</label>
                        <input type="password" name="confirmPassword">
                    </div>
                </div>
            </div>
            <div class="submit-btn">
                <button type="submit" class="btn-submit">Submit</button>
                <a href="/login">Already have an account? click here to log in</a>
            </div>
        </form>
    </div>

@endsection
