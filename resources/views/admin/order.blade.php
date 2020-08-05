@extends('layouts.adminMaster')

@section('title')
    Chocolate Shop Admin
@endsection
@section('links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="/css/candyShop.css"> --}}
@endsection

@section('content')
<div class = "container1">
    {{-- <h1 class = "title1">Dark Chocolate </h1> --}}
    <div class = "align">
        <table>
            <tr class = "tableHeading">
                <th>Order Id</th>
                <th>User Id</th>
                <th>Amount</th>
                <th>Shipped</th>
            </tr>
            @foreach($orders as $order)
               <tr>
                   <td>{{$order->id}}</td>
                   <td>{{$order->userId}}</td>
                   <td>{{$order->totalAmount}}</td>
                   {{-- <td>{{$order->shipped}?</td> --}}
                   <td>
                    @if($order->shipped == 1)
                      <form method = "post" action = "/shipped/{{$order->id}}">
                       @csrf 
                       <input name = "shipped" type="checkbox" checked>
                       <button type = "submit" class = "alterButton">Enter</button>
                      </form>
                    @else
                      <form method = "post" action = "/shipped/{{$order->id}}">
                       @csrf 
                       <input name = "shipped" type="checkbox" >
                       <button type = "submit" class = "alterButton">Enter</button>
                      </form>
                    @endif
                    </td>
               </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection