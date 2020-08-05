@extends('layouts.adminMaster')

@section('title')
    Chocolate Shop: Update Chocolate
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="css/user.css">
@endsection

@section('content')
<form class = "pinkContainer" action="/postupdate/{{$chocolate->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Name</label><br>
    <input type="text" name="name" value = "{{$chocolate->name}}"><br>
    <label>Type</label><br>
    <input type="text" name="type" value = "{{$chocolate->type}}"><br>
    <label>Price</label><br>
    <input type="text" name="price"value = "{{$chocolate->price}}"><br>
    <label>Quantity</label><br>
    <input type="numeric" name="quantity" value = "{{$chocolate->quantity}}"><br>
    <label>Image</label>
    <input type="file" name="image" value = "{{$chocolate->image}}">
    <button class = "purpleButton" type = "submit">Add</button>
</form>
@endsection