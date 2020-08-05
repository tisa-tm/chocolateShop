@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>White Chocolate</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
	<div class = "container1">
        <h1 class = "title1">White Chocolate</h1>
        <div class = "align">
        @foreach($whiteChocolate as $chocolate3)
            <div class = "container2">
                 <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate3->image) }}">
                <h3 class = "title2">{{$chocolate3->name}}</h3>
                <h6 class = "title2">Price: {{$chocolate3->price}}</h6>
                <center><a href = "/singleorder/{{$chocolate3->id}}">Buy</a></center>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>
@endsection