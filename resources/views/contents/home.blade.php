@extends('master.template')

@section('title', 'Amazing E-Grocery')

@section('content')

    <div id="home-page">
        <div id="item-list">
            @foreach ($item as $i)
            <div id="per-item">
                <img src="{{Storage::url('assets/vegetable.png')}}" alt="" style="width:120px; height:120px; border:solid 1px black; border-radius:50%;">
                <h4>{{$i->item_name}}</h4>
                <a href="/item/{{$i->id}}/detail">Detail</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="paginate">
        <div class="page-nav">
            <p>Page &nbsp;</p>
        </div>
        <div class="inside-paginate">
            @for ($i = 1; $i <= $item->lastPage(); $i++)
                <a  href="{{$item->url($i)}}">{{$i}}</a>
            @endfor
        </div>
    </div>

@endsection
