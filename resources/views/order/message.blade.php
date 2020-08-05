@extends('layouts.master')

@section('title')
	Message
@endsection

@section('links')
	<link rel="stylesheet" type="text/css" href="css/createOrder.css">
@endsection

@section('content')
	<br><br><br>
	@if(Session::has('errormessage'))
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
	@endif
@endsection