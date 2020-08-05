@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	{{-- <link rel="stylesheet" type="text/css" href="css/createOrder.css"> --}}
	<style type="text/css">
		body{
	background-color: white;
}
.form{
	margin: 30px 20px;
	/*background-color: red;*/
}
.alterButton{
	/*background-color: rgb(250, 18, 99);*/
	background-color: #FB4887;
	color: white;
	border: none;
	height: 40px;
	width: 100px;
	border-radius: 10px;
}
input{
	/*position: absolute;
	left: 200px;*/
	height: 45px;
	width: 200px;
	border-radius: 10px;
	border: 0.5px solid black;
}
select{
	height: 45px;
	width: 200px;
	border-radius: 10px;
	border: 0.5px solid black;
}
.align{
	margin: 10px 10px;
}
h1{
	text-align: center;
}
.error{
	background-color: rgb(255,0,0,0.3);
	/*position: absolute;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;*/
	/*margin: auto;*/
	width: 20%;
	height: auto;
	padding: 15px 15px;
}
.success{
	background-color: rgb(0,255,0,0.3);
	width: 20%;
	height: auto;
	padding: 15px 15px;
}

	</style>
</head>
<body>
{{-- 	@if(Session::has('message'))
	<center>
		<div class = "error">
			<p>We have run out of the following item: </p>
			<p>{{Session::get('message')}}</p>
		</div>
	</center>
	@endif --}}

<h1>Orders</h1>
<form action = "/order" method = "post" class = "form">
	@csrf
	<center><div id = "parent">
		<div id = "repeat" class = "align">
			
			<label>Name of item</label>
			<select id = "select" name = "chocolateId[]">
				<option select value = "{{$chocolate->id}}">{{$chocolate->name}}</option>
			</select>
			<label>Quantity</label>
			<input type="numeric" name="quantity[]"><br>

		</div>
	</div>	
	<br>
	<button type = "submit" class = "alterButton">Order</button></center>
</form>
<script type="text/javascript" src = "js/chocolateShop.js"></script>
</body>
</html>

@endsection
