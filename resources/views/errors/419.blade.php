@extends('layout')
@section('title') Gainloe -419 page @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 
 <style>
     
@media (min-width: 768px)
{ 
    .not_found_image
    {
        width:60%;
        margin-top:-10%;
    }
}
@media (max-width: 768px)
{ 
    .not_found_image
    {
        width:100%;
       
    }
}
 </style>
<div align="center"  style=" background-color:#DADADA;padding:10%;">
   
 
              <img src="{{asset('public/Img/419.png')}}"  class="not_found_image"   >
 
                <p>Please go back and refresh the page and then try again! if it doesnot work then please close the browser and do again...</p>
        
   
</div>
@endsection