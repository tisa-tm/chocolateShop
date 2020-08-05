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
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Contact Number</th>
      </tr>
      @foreach($users as $user)
         <tr>
             <td>{{$user->id}}</td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->deliveryAddress}}</td>
             <td>{{$user->contactNumber}}</td>
         </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection