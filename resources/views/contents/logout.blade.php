@extends('master.template')

@section('title', 'Logout')

@section('content')

    <div style="display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                margin: auto auto 0 auto;
                height:500px;
                width:500px;
                border: solid 10px #fadf52;
                border-radius: 50%;">
        <h1 style="font-weight: normal; text-align:center;">{{__('msg.Log Out Success!')}}</h1>
    </div>

@endsection
