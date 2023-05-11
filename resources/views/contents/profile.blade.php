@extends('master.template')

@section('title', 'My Profile')

@section('content')

    @if ($errors->any())
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$errors->first()}}
        </div>
    @endif
    <img src="{{Storage::url('images/'.$user->display_picture_link)}}" style="width:120px; height:120px; margin:auto auto 0 auto;">

    <div id="register-content">
    <form action="{{url('/updateProfile')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="register-form">
            <div id="register-first-col">
                <div class="form-group">
                    <label for="FirstName">First Name :</label>
                    <input type="firstName" name="firstName" placeholder="{{ old('first_name', $user->first_name) }}">
                </div>
                <div class="form-group">
                    <label for="Email">Email :</label>
                    <input type="email" name="email" placeholder="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <label for="Gender">Gender :</label>
                    <div style="width:175px;
                                display: flex;
                                justify-content: space-between;">
                        @if ($user->gender_id == 1)
                            <input type="radio" name="optionGender" value="1" checked> <label for="Male">Male</label>
                            <input type="radio" name="optionGender" value="2"> <label for="Female">Female</label>
                        @else
                            <input type="radio" name="optionGender" value="1"> <label for="Male">Male</label>
                            <input type="radio" name="optionGender" value="2" checked> <label for="Female">Female</label>
                        @endif
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
                    <input type="lastNAme" name="lastName" placeholder="{{ old('last_name', $user->last_name) }}">
                </div>
                <div class="form-group">
                    <label for="Role">Role :</label>
                    <select id="" style="width:175px;" disabled>
                        @if ($user->role_id == 1)
                            <option value="" selected>Admin</option>
                        @else
                            <option value="" selected>User</option>
                        @endif
                    </select>
                    <input type="hidden" name="role" value="{{$user->role_id}}" />
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
        </div>
    </form>
    </div>

@endsection
