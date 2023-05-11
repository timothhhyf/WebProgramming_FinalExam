@extends('master.template')

@section('title', 'Cart')

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

    <?php $total = 0; ?>
    @if (count($order) > 0)

        <table style="margin-top: 20px">
            <tr>
                <th>Image</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Option</th>
            </tr>
            @foreach ($order as $orders)
                <tr>
                    <td>
                        <img src="{{Storage::url('assets/vegetable.png')}}" alt="" style="width:120px; height:120px; border:solid 1px black; border-radius:50%;">
                    </td>
                    <td>
                        {{$orders->item->item_name}}
                    </td>
                    <td>
                        {{ 'Rp. ' . number_format($orders->item->price, 2) }}
                    </td>
                    <td>
                        <a href="/order/{{$orders->id}}/delete">Delete</a>

                    </td>
                </tr>

                <?php $total += $orders->item->price; ?>
            @endforeach

        </table>



        <div style="display:flex; flex-direction:column; align-items:center; margin-top:10px;">
            <p>Total : {{ 'Rp. ' . number_format($total, 2) }}</p>
            <a href="/checkOut"
            style="width:100px; background-color:yellow; text-align:center; border: solid 1px black;">CHECK OUT</a>
        </div>

    @else
        There is no order in this cart
    @endif
@endsection
