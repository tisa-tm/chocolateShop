@extends('layouts.adminMaster')

@section('title')
    Admin
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="css/admin.css">
@endsection

@section('content')
    <div class = "welcome">
        <p>Welcome as admin!</p>
    </div>
    <center><h2>Website Details</h2></center><br>
    <div class = "navigationGroup">
        <a href="{{route('vieworder')}}"  class = "viewLink"><div class = "view">Orders</div></a>
        <a href="{{route('vieworderdetail')}}"  class = "viewLink"><div class = "view">Order Details</div></a>
        <a href="{{route('viewchocolate')}}"  class = "viewLink"><div class = "view">Chocolates</div></a>
        <a href="{{route('viewuser')}}"  class = "viewLink"><div class = "view">Users</div></a>
    </div>
@endsection