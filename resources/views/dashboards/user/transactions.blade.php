@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 

<div class="px-5 py-2" style="background:#1CD5E8;margin-top:5px; ">
      

 <p class="my-2"> <span class="fas fa-bars fa-1x" style="font-size:20px;cursor:pointer;color:black;" onclick="openNav()"></span> <a href="/" class="black-text">Home></a><a href="{{url('dashboard')}}" class="black-text">Dashboard></a> <strong class="black-text"> <a href="" class="black-text" >Payments </a> </strong> </p>
            
    
</div>

<div id="mySidenav" class="sidenav">
    <br><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:white;font-size:30px;margin-left:20px;margin-top:80px;">x</a>
  <a href="{{url('dashboard')}}"> <i class="fas fa-tachometer-alt"></i>  Dashboard</a>
  <a href="{{url('profile')}}" > <i class="fas fa-user"></i>   Profile</a>
  <a href="{{url('Orders')}}"> <i class="fas fa-table"></i>  Orders</a>
  <a href="{{url('Payments')}}"> <i class="fas fa-receipt"></i>  Payments</a>
     <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-in-alt"></i> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   <!-- Payments Section Starts Here-->
   <section id="mytransactionsindesktopmode">

    @include('components.user.mytransactionsindesktopmode')
</section>
 <section id="mytransactionsinmobilemode">

    @include('components.user.mytransactionsinmobilemode')
  </section>

<!-- Payments Section Ends Here-->

    
@endsection