@extends('layouts.master')

@section('links')
<link rel="stylesheet" type="text/css" href="css/user.css">
@endsection

@section('content')
    {{-- cart items display and order --}}
    <div id = "cart" class = "pinkContainer">
        <img onclick = "closeCart()" src="images/closeButton2.png" alt="X" align="right">
        <h3>Cart</h3><br>
        @foreach($chocolates as $chocolate)
            <div class = "cartItem">
                <p class = "cartItemName">{{$chocolate->name}}</p>
                <p class = "cartItemTotal">{{$chocolate->total}}</p>
                <a href = "removefromcart/{{$chocolate->cartId}}"><img src="images/closeButton2.png" alt="X" align="right"></a>
                <hr>
            </div>
        @endforeach
        <br>
        <a href = "/orderfromcart" class = "purpleButton">Order</a>
    </div>
    
    {{-- add to cart --}}
    @if(Session::has('chocolateId'))
    <form id = "cartQuantity" action="/addtocart" method = "post">
        @csrf
        <img onclick = "closeCartQuantity()" src="images/closeButton2.png" alt="X" align="right">
        Quantity <br>
        <input type="number" name = "quantity" placeholder="0">
        <input type="hidden" name = "chocolateId" value = "{{Session::get('chocolateId')}}">
        <button class = "purpleButton" type = "submit">Add</button>
    </form>
    @endif

    {{-- message --}}
    @if(Session::has('successmessagecart'))
    <div id = "message" class="pinkContainer">
        <img onclick = "closeMessage()" src="images/closeButton2.png" alt="X" align="right">
        <p>{{Session::get('successmessagecart')}}</p>
    </div>
    @endif

    <br>
    <div class = "container1">
        <h1 class = "title1">Dark Chocolate</h1>
        <div class = "align">
        @foreach($darkChocolate as $chocolate1)
                <div class = "container2">
                    {{-- <img src="'/chocolateimages/'.$chocolate1->image> --}}
                    <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate1->image) }}">
                    <h3 class = "title2">{{$chocolate1->name}}</h3>
                    <h6 class = "title2">Price: {{$chocolate1->price}}</h6>
                   <center><a href = "/gotocart/{{$chocolate1->id}}">Add to cart</a></center>
                </div>
        @endforeach
        </div>
    </div>

    <div class = "container1">
        <h1 class = "title1">Milk Chocolate</h1>
        <div class = "align">
        @foreach($milkChocolate as $chocolate2)
            <div class = "container2">
                <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate2->image) }}">
                <h3 class = "title2">{{$chocolate2->name}}</h3>
                <h6 class = "title2">Price: {{$chocolate2->price}}</h6>
                <center><a href = "/gotocart/{{$chocolate2->id}}">Add to cart</a></center>
            </div>
        @endforeach
        </div>
    </div>

    <div class = "container1">
         <h1 class = "title1">White Chocolate</h1>
         <div class = "align">
        @foreach($whiteChocolate as $chocolate3)
                <div class = "container2">
                    <img class = "chocolateImage" src = "{{ URL::to('/chocolateimages/'.$chocolate3->image) }}">
                    <h3 class = "title2">{{$chocolate3->name}}</h3>
                    <h6 class = "title2">Price: {{$chocolate3->price}}</h6>
                     <center><a href = "/gotocart/{{$chocolate3->id}}">Add to cart</a></center>
                </div>
        @endforeach
        </div>
    </div>
    <script src = "{{ asset('js/chocolateShop.js') }}"></script>
@endsection
 