@extends('master.template')

@section('title', 'Update Role')

@section('content')

    <div class="form-group" style="margin: auto auto auto auto">
        <h3>{{$user->first_name}}&nbsp;{{$user->last_name}}</h3>
        <form action="/updateRole/{{$user->id}}" method="post">
            {{ csrf_field() }}
            <label for="Role">Role :</label>
            <select name="role" id="" style="width:175px;">
                @if ($user->role_id == 1)
                    <option value="{{$user->role_id}}">Admin</option>
                    <option value="2">User</option>
                @else
                    <option value="{{$user->role_id}}">User</option>
                    <option value="1">Admin</option>
                @endif
            </select>
            <button class="btn-submit">Save</button>
        </form>
    </div>

@endsection
