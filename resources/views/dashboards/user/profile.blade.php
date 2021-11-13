@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 
   @if ($errors->any())
          <script>
        $(document).ready(function () {
    
      $('#centralModalfailure').modal('show');
    
      });
      </script>
   
@endif
  @if (session('passwordwontmatch'))
    <script>
    $(document).ready(function () {
           alertify.set('notifier','position','top-right');
                
  
                alertify.alert("Warning","Password Wont Match");
          });
          
    </script>
@endif
   @if (session('successstatus'))

        <script>
            $(document).ready(function () {

        $('#centralModalSuccess').modal('show');

        });
        </script>
@endif

<div class="px-5 py-2" style="background:#1CD5E8;margin-top:5px; ">
      

 <p class="my-2"> <span class="fas fa-bars fa-1x" style="font-size:20px;cursor:pointer;color:black;" onclick="openNav()"></span> <a href="/" class="black-text">Home></a><a href="{{url('dashboard')}}" class="black-text">Dashboard></a> <strong class="black-text"> <a href="" class="black-text" >Profile </a> </strong> </p>
            
    
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
 
    
<div class="container px-5">
       
    <h3 class="py-2  ">My Profile</h3>
               <div class="row ">
   
               <div class="col-md-12">
               
                            <p>Account Created On:  {{Auth::user()->created_at}}</p>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form action="{{url('my-profile-update')}}" method="POST" enctype="multipart/form-data">
                               {{ csrf_field() }}
                                   <div class="card">
                                       <div class="card-body">
                                                   <div class="row">
                   
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label> Name</label>
                                                           <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name"> 
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                               <label> Email-Id</label>
                                                               <input type="text" value="{{Auth::user()->email}}" class="form-control" disabled>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-3">
                                                           @if(Auth::user()->image=='')
                                                           <img src="https://www.lentoprints.com/public/images/user.webp"  alt="User Image"  class="rounded-circle mx-5" style="width:50%">
                   
                                                           @else
                                                               <img src="{{asset('Uploads/profiles/'.Auth::user()->image.'')}}"  alt="{{Auth::user()->image}}"  class="img-fluid mx-5" style="width:50%">
                                                           @endif
                                                           <input type="file" name="image" class="px-5">
                                                       </div>
                                                       <div class="col-md-12 py-2">
                                                           
                                                           <div class="form-group">
                                                                <button type="submit" class="btn btn-success btn-lg"> Update    </button>    
                                                                   <a  data-toggle="modal" data-target="#openpasswordmodel"    class="btaobtn btaobtn-outline-dark btaobtn-lg px-2 py-2"> Change Password    </a>
                                                           </div>
                                                       </div>
                                                   </div>
                                       </div>
                                  </div>
                                  
          
    <h3 class="py-3">Delivery Address</h3>
                                   <div class="card">
                                       
                                       <div class="card-body">
                                                   <div class="row "  >
                                                       <div class="col-md-12">
                                                        
                                                       </div>
                                                       <div class="col-md-6">
                                                           <div class="form-group">
                                                            <label> Address1 ( Door No: )</label>
                                                           <input type="text" value="{{Auth::user()->address1}}" name="address1" class="form-control">
                                                           </div>
                                                       </div>
                           
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label> Address2 ( LandMark/Nearby )</label>
                                                           <input type="text" value="{{Auth::user()->address2}}" name="address2"   class="form-control">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label> City</label>
                                                           <input type="text" value="{{Auth::user()->city}}"  name="city" class="form-control">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label>State</label>
                                                           <input type="text" value="{{Auth::user()->state}}"  name="state" class="form-control">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label>Pincode</label>
                                                           <input type="text" value="{{Auth::user()->pincode}}"  name="pincode" class="form-control">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-4">
                                                        <div class="form-group">
                                                         <label>Country</label>
                                                        <input type="text" value="{{Auth::user()->country}}" name="country" class="form-control">
                                                        </div>
                                                    </div>
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label>Mobile No</label>
                                                           <input type="text" value="{{Auth::user()->mnumber}}" name="mno" class="form-control">
                                                           </div>
                                                       </div>
                           
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                            <label>Alternative Mobile No</label>
                                                           <input type="text" value="{{Auth::user()->alternativemno}}"   name="alternativemno" class="form-control">
                                                           </div>
                                                       </div>
                           
                           
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                                   <button type="submit" class="btn btn-success btn-lg"> Update    </button>
                                                           </div>
                                                       </div>
                                                       </div>
                                       </div>
                                    </div>
                           </form>
                       
               </div>
           </div>
   
       </div>
    <br>

















  <!-- Central Modal Medium Failure -->
  <div class="modal fade" id="centralModalfailure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Error</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn"></i>
          <h3 style="color: red"> Profile Not Updated </h3>
         <ul align="left"  >
                @if($errors->any())
                   @foreach ($errors->all() as $error)
                        
                             <li  class="text-danger">{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
            {{session('passwordwontmatch')}}
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
          <p   class="close" data-dismiss="modal" aria-label="Close"  >
        <button  class="btaobtn btaobtn-danger">Try Again<i class="far fa-gem ml-1 text-white"></i></button>
        </p>
        
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Failure-->

 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead"> Success</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>{{session('successstatus')}} </p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         
         <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Close</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->
 
 
 <!--  Password Model Starts Here -->
 <form method="POST" action="update-password">
     @csrf
 <div class="modal fade" id="openpasswordmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-primary" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Update Your Password</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-key fa-4x mb-3 animated rotateIn"></i>
           <input type="password" class="form-control" name="newpass" placeholder="Enter New Password"><br>
            <input type="password" class="form-control" name="confirm_new_Pass" placeholder="Re-Enter Password">
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         
         <button type="submit" class="btn btn-outline-primary waves-effect" >Update</button>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Password Model Closed Here-->
 </form>
@endsection