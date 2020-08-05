@extends('layouts.adminMaster')

@section('title')
    Chocolate Shop Admin
@endsection
@section('links')
    <link rel="stylesheet" type="text/css" href="css/user.css">
@endsection

@section('content')
<div class = "container1">
  <div class = "align">
    <table>
      <tr class = "tableHeading">
          <th>Id</th>
          <th>Order Id</th>
          <th>Chocolate Id</th>
          <th>Chocolate Name</th>
          {{-- <th>Quantity</th> --}}
          <th>Price</th>
          <th>Amount</th>
          <th>User Id</th>
          <th>Total Amount</th>
      </tr>
      @foreach($orderdetails as $orderdetail)
         <tr>
             <td>{{$orderdetail->id}}</td>
             <td>{{$orderdetail->orderId}}</td>
             <td>{{$orderdetail->chocolateId}}</td>
             <td>{{$orderdetail->name}}</td>
             {{-- <td>{{$orderdetail->orderdetail}}</td> --}}
             <td>{{$orderdetail->price}}</td>
             <td>{{$orderdetail->amount}}</td>
             <td>{{$orderdetail->userId}}</td>
             <td>{{$orderdetail->totalAmount}}</td>
         </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection