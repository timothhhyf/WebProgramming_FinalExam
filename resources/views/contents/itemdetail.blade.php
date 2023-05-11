@extends('master.template')

@section('title', "{$itemDetail->item_name}")

@section('content')

    <div id="item-detail">
        <div id="img-info">
            <div id="name-img">
                <h3>{{$itemDetail->item_name}}</h3>
                <img src="{{Storage::url('assets/vegetable.png')}}" alt="" style="width:175px; height:175px; border:solid 1px black; border-radius:50%;">
            </div>
            <div id="detailinfo">
                <h4>{{ 'Rp. ' . number_format($itemDetail->price, 2) }}</h4>
                <p>LIMITED VEGETABLE!</p>
                <p>{{$itemDetail->item_desc}}</p>
                <p>Note : This vegetable has taken a part in Lomba Sayur in Indonesia!</p>
            </div>
        </div>
    </div>

    <div style="display:flex; justify-content:center; margin-top:10px;">
        <a href="/addingcart/{{$itemDetail->id}}"
        style="width:50px; background-color:yellow; text-align:center; border: solid 1px black;">BUY</a>
    </div>

@endsection
