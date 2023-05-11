@extends('master.template')

@section('title', 'Account Maintenance')

@section('content')

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <table>
        <tr>
            <th>Role-Name</th>
            <th>Update Option</th>
            <th>Delete Option</th>
        </tr>
        @foreach ( $user as $u)
        <tr>
            <td>
                @if ($u->role_id==1)
                    Admin &nbsp;-&nbsp;
                @else
                    User &nbsp;-&nbsp;
                @endif
                {{$u->first_name}}
                {{$u->last_name}}
            </td>
            <td>
                <a href="/updateRolePage/{{$u->id}}">Update Role</a>
            </td>
            @if ($u->id != Auth::user()->id)
            <td>
                <a href="/deleteUserAdmin/{{$u->id}}">Delete</a>
            </td>
            @else
            <td>
                Can't delete yourself
            </td>
            @endif
        </tr>
        @endforeach
    </table>

@endsection
