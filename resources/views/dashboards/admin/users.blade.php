@extends('layouts.admin')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
<div align="center" style="background:#1CD5E8;padding:20px;">
  <h3  class="black-text" style="font-weight:bold;"><a href="{{url('admin-dash')}}">Admin Dashboard</a></h3>
<p class="white-text" style="font-weight:bold;">

   <a href="" class="badge badge-pill btn-dark disabled px-3 py-2">   <i class="fas fa-users"></i>  All Users</a> 
    <a href="{{url('admin-bin-users')}}" class="badge badge-pill btn-outline-danger px-3 py-2"><i class="fas fa-dumpster"></i> Recycle Bin</a>
    </p>
@if (session('status'))
  <div class="alert alert-danger" role="alert">
      {{ session('status') }}
  </div>
  @endif
  

</div>


 

<div class="container py-2">

   <p align="left">
        <i class="fas fa-users"></i> Registerd Users
   </p>
     <!--Grid column-->
     <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

        <!--Card content-->
        <div class="card-body">

            <!-- Table  -->
            <table  class="table table-hover">
            <!-- Table head -->
            <thead class="blue-grey lighten-4">
                <tr>
                <th>#Id</th>
                <th>Name</th>
                <th>EmailId</th>
                <th>Role</th>
              
                <th>Action</th>
                </tr>
            </thead>
            <!-- Table head -->

            <!-- Table body -->
            <tbody>
                @foreach ($users as $data)
                <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
                <td>
                    <a href="{{url('admin/role-edit/'.$data->id)}}" class="badge badge-pill btn-primary px-3 py-2">Edit</a>
                        <a href="{{url('admin/delete-user/'.$data->id)}}" class="badge badge-pill btn-danger px-3 py-2">Delete</a>
                    </td>

                </tr>
                @endforeach

            </tbody>
            <!-- Table body -->
            </table>
            <!-- Table  -->
          <!-- Feteching Pagination  Links-->
          {{ $users->links()}}

        </div>

        </div>
        <!--/.Card-->

    </div>
<!--Grid column-->

</div>
<hr>
@endsection