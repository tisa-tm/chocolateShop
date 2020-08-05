@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Dark Chocolate</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
	<div class = "container1">
        <h1 class = "title1">Dark Chocolate</h1>
        <div class = "align">
        @foreach($darkChocolate as $chocolate1)
            <div class = "container2">
                 <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate1->image) }}">
                <h3 class = "title2">{{$chocolate1->name}}</h3>
                <h6 class = "title2">Price: {{$chocolate1->price}}</h6>
                <center><a href = "/singleorder/{{$chocolate1->id}}">Buy</a></center>
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection