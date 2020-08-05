@extends('layouts.master')

@section('links')
<link rel="stylesheet" type="text/css" href="css/createOrder.css">
@endsection

@section('content')
	{{-- @if(Session::has('errormessage'))
	<center>
		<div class = "error">
			<p>We have run out of the following item: </p>
			<p>{{Session::get('errormessage')}}</p>
		</div>
	</center>
	@endif

	@if(Session::has('successmessage'))
	<center>
		<div class = "success">
			<p>{{Session::get('successmessage')}}</p>
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
					<option id = "options" select disabled="">Choose One</option>
					@foreach($chocolateName as $name)
						<option value = "{{$name->id}}">{{$name->name}}</option>
					@endforeach
				</select>

				<label>Quantity</label>
				<input type="numeric" name="quantity[]"><br>

			</div>
		</div>	
		<br>
		<button type = "button" id = "addElements" onclick = "addNewItem()" class = "alterButton">More items</button><br><br>
		<button type = "submit" class = "alterButton">Order</button></center>
</form>
<script type="text/javascript" src = "js/chocolateShop.js"></script>
@endsection
