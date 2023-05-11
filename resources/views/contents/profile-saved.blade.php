@extends('master.template')

@section('title', 'Saved')

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
        <h1 style="font-weight: normal; text-align:center;">{{__('msg.Saved!')}}</h3>
        <a href="/home">{{__('msg.Click here to go home')}}</a>
    </div>

@endsection
