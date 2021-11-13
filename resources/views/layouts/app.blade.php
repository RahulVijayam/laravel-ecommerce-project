<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
            <meta charset="utf-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>@yield('title')</title>
            <meta name="keywords" content="@yield('keywords')">
            <meta name="description" content="@yield('description')">
             <!-- Favicons -->
            <link href="{{asset('assets/img/Logo-Square.webp')}}" rel="icon">
            <link href="{{asset('assets/img/Logo-Square.webp')}}" rel="apple-touch-icon">
            <link href="{{asset('css/responsivecode.css')}}" rel="stylesheet"> 
             
            <link href="{{asset('css/main.css')}}" rel="stylesheet">
             
            <link href="{{asset('css/richtext.min.css')}}" rel="stylesheet">
             
            <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
              
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
            <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
                
             <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
                
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
                       <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
              <!--google fonts-->
             <link  href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Acme&family=Balsamiq+Sans&family=Bowlby+One+SC&family=Fredoka+One&family=Josefin+Sans:wght@700&family=Lobster&display=swap" rel="stylesheet">
                  <!--google fonts closed-->
              
    </head>
    <body id="body" class="contentfont" style="background:white;">
     
       
     @yield('content') 
    <script src="{{asset('assets/js/main.js')}}">  </script>
    <script src="{{asset('js/main.js')}}">  </script>
    
    <script src="{{asset('js/cart.js')}}">  </script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  
    </body>
</html>
