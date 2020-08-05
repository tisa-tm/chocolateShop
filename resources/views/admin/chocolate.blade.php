@extends('layouts.adminMaster')

@section('title')
    Chocolate Shop Admin
@endsection
@section('links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
@endsection

@section('content')
<div class = "container3">
    <center><button class = "newButton"><a style = "color: white;" href="{{route('add')}}">New</a></button></center>
</div>
@if(Session::has('message'))
    <div id = "message" class = "pinkContainer">
        <img onclick = "closeMessage()" src="images/closeButton2.png" alt="X" align="right">
    	<p>{{Session::get('message')}}</p>
    </div>
@endif

<div class = "container1">
    <h1 class = "title1">Dark Chocolate</h1>
    <div class = "align">
    @foreach($darkChocolate as $chocolate1)
        {{-- <div class = "container2"> --}}
            <form action = "/update/{{$chocolate1->id}}" method = "post" class = "container2">
                @csrf
                <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate1->image) }}">
                <center><h3 class = "title2">{{$chocolate1->name}}</h3>
                <h6>Quantity: {{$chocolate1->quantity}}</h6>
                <h6>Price: {{$chocolate1->price}}</h6>
                <h6>Type: {{$chocolate1->type}}</h6><br>
                <button type = "submit" class = "alterButton">Alter</button></center>
        </form>
        {{-- </div> --}}
    @endforeach
    </div>
</div>

<div class = "container1">
    <h1 class = "title1">Milk Chocolate</h1>
    <div class = "align">
    @foreach($milkChocolate as $chocolate2)
        {{-- <div class = "container2"> --}}
            <form action = "/update/{{$chocolate2->id}}" method = "post" class = "container2">
                @csrf
                <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate2->image) }}">
                <center><h3 class = "title2">{{$chocolate2->name}}</h3>
                <h6>Quantity: {{$chocolate2->quantity}}</h6>
                <h6>Price: {{$chocolate2->price}}</h6>
                <h6>Type: {{$chocolate2->type}}</h6><br>
                <button type = "submit" class = "alterButton">Alter</button></center>
            </form>
        {{-- </div> --}}
    @endforeach
    </div>
</div>

<div class = "container1">
    <h1 class = "title1">White Chocolate</h1>
    <div class = "align">
    @foreach($whiteChocolate as $chocolate3)      
        {{-- <div class = "container2"> --}}
            <form action = "/update/{{$chocolate3->id}}" method = "post" class = "container2">
                @csrf
                <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate3->image) }}">   <br>
                <center><h3 class = "title2">{{$chocolate3->name}}</h3>
                <h6>Quantity: {{$chocolate3->quantity}}</h6>
                <h6>Price: {{$chocolate3->price}}</h6>
                <h6>Type: {{$chocolate3->type}}</h6><br>
                <button type = "submit" class = "alterButton">Alter</button></center>
            </form>
        {{-- </div>      --}}
    @endforeach
	</div>
</div>
@endsection