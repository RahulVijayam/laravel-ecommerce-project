@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 <style>
     @media (max-width: 768px)
    { 
      #profileimage
      {
          width:60%;
      }
    }
      @media (min-width: 768px)
    { 
      #profileimage
      {
          width:100%;
      }
    }
 </style>

<div class="px-5 py-2" style="background:#1CD5E8;margin-top:5px;" >
      

 <h5 class="my-3"> <span class="fas fa-bars fa-1x" style="font-size:20px;cursor:pointer;color:black;" onclick="openNav()"></span> <a href="/" class="black-text">Home></a> <strong class="black-text"> <a href="" class="black-text" >Dashboard </a> </strong> </h5>
            
    
</div>  <br><br>

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

 
                 <!-- Home Section Starts Here-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div  class="col-md-4">
                                        <p align="center">
                                        @if(Auth::user()->image=='')
                                        <img src="https://www.lentoprints.com/public/images/user.webp" id="profileimage"  alt="User Image"  class="img-fluid p-5" >

                                        @else
                                            <img src="{{asset('Uploads/profiles/'.Auth::user()->image.'')}}"  alt="{{Auth::user()->image}}"   id="profileimage"   class="img-fluid p-5"  >
                                        @endif
                                        </p>

                                    </div>
                                    <div class="col-md-5  py-5 my-3"  >

                                              <!-- Heading -->
                                              <div class="card  wow fadeIn" id="userdashboardcontent" >

                                                <!--Card content-->
                                                <div class="card-body  d-sm-flex justify-content-between">

                                                     <ul style="list-style: none; ">
                                            <li><strong>Name:</strong> {{Auth::user()->name}}</li>
                                            <li><strong>Email-Id:</strong> {{Auth::user()->email}}</li>
                                            <li><strong>Address:</strong> {{Auth::user()->address1}},
                                                        {{Auth::user()->address2}},
                                                        {{Auth::user()->city}} -
                                                        {{Auth::user()->pincode}},
                                                        {{Auth::user()->state}},
                                                        {{Auth::user()->country}}</li>

                                            </li>

                                            <li><strong>Mobile Number:</strong>{{Auth::user()->mnumber}}</li>

                                            <li style="float:left;"><strong>Alternative Mobile No: </strong>{{Auth::user()->alternativemno}}
                                            <a href="{{url('profile')}}" class="btaobtn btaobtn-outline-dark p-2">Edit</a></li>
                                            
                                        </ul>



                                                </div>

                                             </div>

                                    </div>
                                    <div align="center" class="col-md-12">
                                         <a href="{{url('cart')}}"  class="btaobn btaobtn-outline-danger px-3 py-3 mx-3"  >  
                                             <i class="fas fa-shopping-cart"  ></i>
                                            <span class="basket-item-count"  >
                                              <span class="badge badge-pill red"> {{ count((array) session('cart')) }}  </span>
                                              </span> 
                                              <span style="font-size:20px;">Go to Cart<i class="fas fa-long-arrow-alt-right  mx-1"></i>
                                              </span> 
                                              </a> 
                                    </div>
                                </div>
   
                       </div>
                       <br>

                    <!-- Home Section Ends Here-->
  
@endsection
