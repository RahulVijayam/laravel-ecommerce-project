@extends('layouts.admin')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
<div align="center" style="background:#1CD5E8;padding:20px;">
  <h3  class="black-text" style="font-weight:bold;"><a href="{{url('admin-dash')}}">Admin Dashboard</a></h3>
<p class="white-text" style="font-weight:bold;"> </p>
@if (session('status'))
  <div class="alert alert-danger" role="alert">
      {{ session('status') }}
  </div>
  @endif
  

</div>

 

<div class="container py-2">
   
   <p align="center">
        <img src="{{asset('Img/admin_image.png')}}" class="img-fluid" style="width:70px;" >
   </p>
    <div class="row">
        <div class="col-xl-3 col-md-6">
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><i class="fas fa-users"></i> Registerd Users</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="admin-all-users">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success  text-white mb-4">
                <div class="card-body"> <i class="fas fa-file"></i> Orders</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('admin-Orders')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger  text-white mb-4">
                <div class="card-body"><i class="fab fa-product-hunt"></i> Products </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('admin-products')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark      text-white mb-4">
                <div class="card-body"> <i class="fas fa-rupee-sign"></i> Transactions</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('admin-Transactions')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
         <div class="col-xl-12 col-md-6">
            <div class="card bg-warning       mb-4">
                <div class="card-body">   News Letter Subscription Data</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link" href="{{url('admin-news-letter')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div><br><br>
        </div>
    </div>
</div>
<hr>
@endsection