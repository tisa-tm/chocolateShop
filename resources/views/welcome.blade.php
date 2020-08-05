<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chocolate Shop</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="/css/candyShop.css">
    </head>

<body>
<nav id="navi" class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="{{url('/')}}">Chocolate Shop</a>
        <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                    <a class = "nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                    <a class = "nav-link" href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                        <a class = "nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
        @endif
        </ul>  
    </nav> 

    <!--jumbotron-->
    <div class="introduction">
        <div class = "introduction-background">
        <h1 class="introduction-heading">Welcome!</h1>
            <p>Order chocolates form home now. Only one click away.</p>
            <center><button id="joinButton"><a style = "color: white;" href="{{route('register')}}">Order Now</a></button></center>  
        </div>

        <svg viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="0,100 100,20 100,100" />
        </svg>
      
    </div>

    {{-- slanted section --}}
    <div id="slanted">
        <div id = "slantedText">
               <!--cards--> 
            <div class="container">
                <div class="card-group">
                    <!--Chocolate-->
                    <div class="card card1">
                        <a href = "{{route('darkchocolate')}}"><img class="card-img-top" src="images/darkChocolate.jpg" alt="An image"></a>
                        <div class="card-body">
                            <a href = "{{route('darkchocolate')}}"><h3>Dark Chocolate</h3></a>
                        </div>
                    </div>
                    <!--Candy-->
                    <div class="card card2">
                         <a href = "{{route('milkchocolate')}}"><img class="card-img-top" src="images/milkChocolate.jpg" alt="An image"></a>
                        <div class="card-body">
                            <a href = "{{route('milkchocolate')}}"><h3>Milk Chocolate</h3></a>
                        </div>
                    </div>
                    <!--Cocoa-->
                    <div class="card card3">
                        <a href = "{{route('whitechocolate')}}"><img class="card-img-top" src="images/whiteChocolate.jpg" alt="An image"></a>
                        <div class="card-body">
                            <a href = "{{route('whitechocolate')}}"><h3>White Chocolate</h3></a>
                        </div>
                       {{--   <img class="card-img-top" src="images/chocolate.jpg" alt="An image">
                        <div class="card-body">
                           <h3>White Chocolate</h3>
                        </div>
                    </div></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div> 

     <br><br>


    <!--footer-->
     {{-- style = "background-color: red"; --}}
    <footer id="footer">
        <div class="container">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit deleniti distinctio tenetur aliquam, nesciunt quisquam pariatur nulla cumque qui quos consequatur deserunt cum sunt quod dolorum iusto accusamus rem fugiat!</p> 
        </div>
    </footer>
</body>
</html>
