 
<section class="section" style="margin-top:-100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $total = 0 ?>
                @if(session('cart'))

                    <!-- this block is all about display the products present in the cookie  -->
                     
                            <div class="shopping-cart">
                                <div class="shopping-cart-table">
                                    <div class="table-responsive">
                                        <div class="col-md-12 text-right mb-3" style="margin-top:15px;">
                                            <a href="clear-cart" class=" font-weight-bold ">Clear Cart</a>
                                        </div>
                                        @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['Final_Price'] * $details['item_quantity'] ?>
                                        

                                            <div  align="center" class="card p-3 cartpage cart-product-quantity" >
                                                        <a class="entry-thumbnail" href="javascript:void(0)">
                                                            <img src="{{asset('Uploads/Products/'.$details['item_image'].'') }}" width="100%" alt="{{$details['item_image']}}">
                                                        </a>
                                                   <br>
                                                        <h4  >
                                                            <a href="javascript:void(0)">{{ $details['item_name'] }}</a>
                                                        </h4>
                                                                                                     
                                        <input type="hidden" class="product_id" value="{{ $details['item_id'] }}">
                                                      Quantity:   <div class="modify_quantity">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                          ><i class="fas fa-minus"></i></button>
                                                        <input class="quantity" min="1" name="quantity" value="{{ $details['item_quantity'] }}" type="number" style="width:50px;margin:0px;">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                           ><i class="fas fa-plus"></i></button>
                                                      </div>

                                                       Price     <strong>
                                                        <span class="cart-grand-total-price">
                                                        <strike class="red-text" style="font-size:20px;">{{ $details['item_price']  * $details['item_quantity']}}/-</strike> </span>
                                                        <span class="green-text" style="font-size:25px;">{{ $details['Final_Price'] * $details['item_quantity']}} /- </span><br>
                                                        <span>{{$details['contentforofferprice']}}</span>
                                                    </strong>
                                                   </p>
                                                   <div class="col-md-4">
                                                    <form action="delete-from-cart" method="post">
                                                        @csrf
                                                        <input type="hidden"  name="id" value="{{ $id }}">
                                                  
                                                <button type="submit" class="  badge badge-pill btn-danger px-2 py-2" data-id="{{ $id }}" >Remove </button>
                                            </form>
                                                </div>
                                                   
                                                </tr>
                                                 </div>
                                                @endforeach


                                    </div>
                                </div><!-- /.shopping-cart-table -->
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="cart-shopping-total">
                                        <hr>
                                        <div class="row">
                                            <div align="center"  class="col-md-6">
                                                <h6 class="cart-grand-name"><strong>Grand Total</strong></h6>
                                            </div>
                                            <div align="center" class="col-md-6">
                                                <h1 class="cart-grand-price">
                                               <strong> Rs.
                                                <span class="cart-grand-price-viewajax">{{$total}}</span></strong>
                                                </h1>
                                            </div>
                                        </div>
                                            <hr>
                                        <div align="center" class="row">
                                            <div class="col-md-12">
                                                <div class="cart-checkout-btn text-center">
                                                    @if (Auth::user())
                                                         <a href="{{ url('checkout') }}" class="btn btn-outline-success   checkout-btn text-dark">PROCCED TO CHECKOUT</a>
                                                    @else
                                                        <a href="{{ url('login') }}" class="btn btn-outline-success  checkout-btn text-dark">PROCCED TO CHECKOUT</a>
                                                        {{-- you add a pop modal for making a login --}}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-2">
                                                 Or
                                            </div>
                                            <div align="center" class="col-md-12">
                                     
                                                <a href="/" class="btaobtn   btaobtn-primary">Continue Shopping</a>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /.shopping-cart -->
 


                            @else
                            <!-- this block is all about display the message that the cart is empty -->
                                <div class="row">
                                    <div class="col-md-12 mycard py-5 text-center">
                                        <div class="mycards">
                                            <h4>Your cart is currently empty.</h4>
                                            <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5" style="border-radius:30px;">Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>
