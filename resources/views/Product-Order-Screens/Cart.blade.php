@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')

<style>
    
    @media (min-width: 768px)
    {
           #cartindesktopmode
        {
            display: block;
        }
        #cartinmobilemode
        {
            display:none;
        }
    }
        
    @media (max-width: 768px)
    {
           #cartindesktopmode
        {
            display: none;
        }
        #cartinmobilemode
        {
            display:block;
        }
    }
    </style>
    
<div  class="px-5 py-2" style="background:#1CD5E8;margin-top:5px;" >
      <h5 class="my-2">  <a href="/" class="black-text">Home></a> <strong class="black-text"> <a href="" class="white-text" >Cart </a> </strong> </h5>
               
</div>
    
 
           <!-- Cart Section Starts Here-->
                            <section id="cartindesktopmode">
                                    @include('components.cartindesktopmode')
                            </section>
     
      <section id="cartinmobilemode">
                                    @include('components.cartinmobilemode')
                            </section>
     
                                <!-- Cart Section Ends Here-->
@endsection