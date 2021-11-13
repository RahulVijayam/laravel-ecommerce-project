@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 
<div class="px-5 py-2" style="background:#1CD5E8;margin-top:5px;" >
  <h5 class="my-2">  <a href="/" class="black-text">Home</a> <strong class="black-text"> > <a href="{{url('cart')}}" class="black-text" >Cart </a> > <a href="" class="white-text" >Check out </a> </strong> </h5>
           
</div>
<h2 align="center" id="writetitle" class="black-text py-3" style="font-weight:bold;">Order Summary</h2>
<script>
    function Continue()
    {
      event.preventDefault();
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url:"Shipping_Payment_Screen",
        type:"get",
        data:{
          CSRF_TOKEN
        },
        success:function (data)
        {
          window.scroll({    top: 0, left: 0,    behavior: 'smooth'  });
          //console.log(data)
          $('#dynamic_content').html(data)
         
          $('#writetitle').html('Shipping & Payment Details') 
           
         
        }
      })
    }
     
</script>
@if (session('invalid'))
  
      <script>
          $(document).ready(function () {
           alertify.set('notifier','position','top-right');
                
  
                alertify.alert("Reponse","You Entered Invalid Promo Code");
          });
     </script>
     
@endif  
@if (session('valid'))
  
      <script>
          $(document).ready(function () {
           alertify.set('notifier','position','top-right');
                
  
                alertify.success("Promo Code Applied Succesfully");
          });
     </script>
     
@endif 

     <section  class="container py-4">
         <div class="row">
             <div id="dynamic_content" class="col-md-12">
                <div class="col-md-6" id="order_summary"  >
                
                        <ul  class="card    p-3"  style=" list-style: none;">
                                    
                            @if(session('cart'))
                                <?php $total=0;$count=0;$delivery_charges=0 ?>
                                @foreach(session('cart') as $id => $details)
                                <?php     $count=$count +1 ;
                                $total += $details['Final_Price'] * $details['item_quantity'] ?>

                        
                                @endforeach
                                
                                <li>
                                    <p align="left" style="float:left;">
                                        <strong>
                                            Product
                                        </strong>
                                    </p>
                                   
                                    
                                    <p align="right" >
                                        <strong>
                                            Price
                                        </strong>
                                    </p>
                                </li>
                                <li>
                                    
                                        @foreach(session('cart') as $id => $details)
                                            <p align="left" style="float:left;">
                                                
                                                <img src="{{asset('Uploads/Products/'.$details['item_image'].'') }}" width="15px" > {{$details['item_name']}}
                                            
                                            </p>
                                            
                                            <p align="right" >
                                                {{$details['item_quantity']}} X    {{$details['Final_Price']}}
                                                
                                            </p>
                                          <?php $delivery_charges = $delivery_charges + $details['delivery_charges'] ?>
                                        @endforeach
                                         <p align="left" style="float:left;color:#000066;">
                                             Delivery Charges
                                         </p>
                                         <p align="right" style="color:#000066" >
                                            <?php echo $delivery_charges?>  /-
                                          </p>
                                </li>
                                    <li>  <hr>
                                        <p align="left" style="float:left;">
                                            SubTotal: 
                                        </p>
                                        @if(session('promocode'))
                                        <p align="right" >
                                                   <span class="cart-grand-total-price">
                                                   <strike class="red-text" style="font-size:15px;">{{ $total }}/-</strike> </span>
                                                    <span class="green-text" style="font-size:20px;">{{ $total -session('discount') * $total / 100     }} /- </span><br>
                                                    <span class="green-text" style="font-size:15px;" > 
                                                        {{session('discount')}}   {{session('message')}}
                                                                             
                                                    </span>               
                                        </p>
                                      
                                      
                                        @else 
                                        <p align="right" >
                                            <i class="fas fa-rupee-sign " ></i>  {{$total}}  
                                        </p>
                                        <a href="" data-toggle="modal" data-target="#modalDiscount" >Have a PromoCode</a>
                                    
                                        @endif
                                      
                                        <hr>
                                    </li>
                                
                                    <li>
                                        <p align="left" style="float:left;">
                                            Total: 
                                        </p>
                                        <h4 align="right" >
                                            <i class="fas fa-rupee-sign " ></i>  <strong>
                                              {{ $total +  $delivery_charges - session('discount') * $total / 100     }}</strong> 
                                        </h4>
                                    </li>    
                                    @endif

                                    <button onclick="Continue()" class="btaobtn btaobtn-outline-dark px-2 py-2">Continue</button>
                    
                        </ul>
                
                </div>
             </div>
         </div> 
                          

           
         
  
</section>
       
   
   
  
      <!--Modal: modalDiscount-->
      <div class="modal fade right" id="modalDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <p class="heading">Have a Promo Code
                <strong></strong>
              </p>
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>  
  <form method="POST" action="apply-promocode">
      @csrf
            <!--Body-->
            <div class="modal-body">
  
              <div class="row">
                <div class="col-12">
                  <p></p>
                  <p class="text-center">
                    <i class="fas fa-gift fa-4x"></i>
                  </p>
                </div>
  
                <div class="col-12">
                  <input type="text" class="form-control" name="promo_code" placeholder="Enter Promo Code ">
                  
                </div>
              </div>
            </div>
  
            <!--Footer-->
            <div class="modal-footer flex-center">
              <button type="submit" class="btn btn-danger">Apply 
                <i class="far fa-gem ml-1 white-text"></i>
              </button>
              <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
  </form>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: modalDiscount-->
      
      
      
      
      
      
   @if ($errors->any())
          <script>
        $(document).ready(function () {
    
      $('#centralModalfailure').modal('show');
    
      });
      </script>
   
@endif
   








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
          <h3 style="color: red"> Some Errors are Found! </h3>
         <ul align="left"  >
           @foreach ($errors->all() as $error)
               
                             <li  class="text-danger">{{ $error }}</li>
             
             
              
                
               
              
          
            @endforeach
           
            
            </ul>
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

 
      
      
      
      
 
@endsection