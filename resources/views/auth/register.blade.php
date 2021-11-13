@extends('layouts.app')

@section('title')
Register - Gainloe
@endsection

@section('keywords')
 

@endsection

@section('description')
 
@endsection


@section('content')
 
<div align="center" class="container-fluid  my-3   animated bounceIn">

        <div class="col-md-2 animated bounceIn" >
            <a href="/">
            <img src="{{asset('assets/img/Logo-Square.webp')}}" class="img-fluid px-2 py-2" style="width:200px;">
            </a>
        </div>
        <h5 class="my-2" > Create your Account</h5>
        <div class="row justify-content-center ">
                <div class="col-md-7" style="width: 100%">



                            <form    method="POST" action="{{ route('register') }}">
                                @csrf

                                <div   class="form-group row  justify-content-center ">

                                    <div   class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Password') }}" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0  justify-content-center ">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btaobtn btaobtn-outline-dark px-2 py-2">
                                            Create My Account
                                        </button><br><br>By Signing up! You are agreeing all the <a href="{{url('Terms-and-Conditions')}}" target="_blank">Terms and Conditions</a> 
                                    </div>
                                    <div class="col-md-6 p-2">  <strong>Already Have an Account! Please <a href="login" ><u>Login</u></a></strong>
                                    </div>
                                    <div class="col-md-12 ">
                                        or
                                   <p class="my-2"> 
                                          <a class="black-text" href="/">
                                               <i class="fas fa-arrow-left"></i>
                                           <u>Back to Gainloe</u>
                                           </a>
                                   </p> 
                                 </div>
                                </div>
                            </form>


                </div>
        </div>
</div>
@endsection
