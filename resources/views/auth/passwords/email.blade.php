@extends('layouts.app')
@section('title')
Reset Your Password - Lento Prints
@endsection

@section('keywords') 

@endsection

@section('description')
You Can Reset you password

@endsection


@section('content')
 <div align="center" class="container-fluid py-5 my-5 animated bounceIn">

    <div class="col-md-2" >
        <a href="/">
            <img src="{{asset('assets/img/Logo-Square.webp')}}" class="img-fluid px-2 py-2" style="width:200px;">
        </a>
    </div>
   <h5 class="my-2" >Reset Your Password</h5>
   <div class="row justify-content-center">
        <div class="col-md-7">
             <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div  align="left" class="col-md-6  p-2">
                             
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                            <div class="col-md-12">
                                <button type="submit" class="btaobtn btaobtn-dark px-5 py-2">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                         
                    </form>
                    <div class="col-md-12 ">
                        or
                                   <p class="my-2"> 
                                          <a class="black-text" href="/">
                                               <i class="fas fa-arrow-left"></i>
                                           <u>Back to Gainloe</u>
                                           </a>
                                   </p> 
                                </div>
                                             <div class="col-md-12">
                                                 <div class="card-body">
                                                         @if (session('status'))
                                                         <div class="alert alert-success" role="alert">
                                                             <strong>{{ session('status') }}</strong>
                                                        </div>
                                                         @endif
                                                    </div>
                                                    
                                             </div>
        </div>
    </div> 
</div>
   
@endsection
