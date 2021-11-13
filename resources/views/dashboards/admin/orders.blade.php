@extends('layouts.admin')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
<div align="center" style="background:#1CD5E8;padding:20px;">
  <h3  class="black-text" style="font-weight:bold;"><a href="{{url('admin-dash')}}">Admin Dashboard</a></h3>
<p class="white-text" style="font-weight:bold;">Order Details </p>
@if (session('status'))
  <div class="alert alert-danger" role="alert">
      {{ session('status') }}
  </div>
  @endif
  

</div>


<!-- Orders Section Starts Here-->
<div id="ordersindesktopmode">
    @include('components.admin.ordersindesktopmode')
</div>

<div id="ordersinmobilemode">
      @include('components.admin.ordersinmobilemode')
</div>

 <!-- Orders Section Ends Here-->
 @if (session('Order_Status'))
    @include('components.admin.orderstatus')
    <script>
        $(document).ready(function ()
        {
            $('#show_Order_Status_Modal').modal('show');
        });
    </script>
 @endif

  
@endsection