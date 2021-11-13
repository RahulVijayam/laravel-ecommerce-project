@extends('layouts.admin')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
<div align="center" style="background:#1CD5E8;padding:20px;">
  <h3  class="black-text" style="font-weight:bold;"><a href="{{url('admin-dash')}}">Admin Dashboard</a></h3>
  <a href="{{url('admin-all-users')}}" class="btn btn-outline-dark" style="color:white">Back</a> 
@if (session('status'))
  <div class="alert alert-danger" role="alert">
      {{ session('status') }}
  </div>
  @endif
  

</div>


 

<div class="container py-2">
   <p align="left">
    <i class="fas fa-edit"></i> Edit User Role
   </p>
     
    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

        <!--Card content-->
        <div class="card-body">
            <h3>Current Role:{{$userroles->role}}</h3>
        <form action="{{ url('admin/role-update/'.$userroles->id) }}" method="POST">
            {{  csrf_field()  }}

                <div class="form-group">
                <input type="text" class="form-control" name="name"  placeholder="User Name" readonly value="{{ $userroles->name }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" readonly value="{{ $userroles->email }}">
                    </div>

                        <div class="form-group">
                            <select class="form-control" name="role">
                                <option value=""  disabled >Select--Role</option>
                                <option value="user">Default</option>
                                <option value="admin">Admin</option>
                            </select>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>

            </form>


        </div>

    </div>
    <!--/.Card-->

</div>
<!--Grid column-->

</div>
<hr>
@endsection