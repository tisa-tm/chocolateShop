@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Milk Chocolate</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
	<div class = "container1">
        <h1 class = "title1">Milk Chocolate</h1>
        <div class = "align">
        @foreach($milkChocolate as $chocolate2)
            <div class = "container2">
                 <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate2->image) }}">
                <h3 class = "title2">{{$chocolate2->name}}</h3>
                <h6 class = "title2">Price: {{$chocolate2->price}}</h6>
                <center><a href = "/singleorder/{{$chocolate2->id}}">Buy</a></center>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>
@endsection