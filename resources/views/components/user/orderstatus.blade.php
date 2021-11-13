<!-- Central Modal Medium Success -->
<div class="modal modal-large fade" id="show_Order_Status_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
    <div  align="center" class="modal-dialog modal-notify modal-success modal-xl" role="document" >
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Order Status for Order Number : {{session('Order_id')}} </p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
           <!-- <h3>Order No : {{session('Order_id')}} </h3>-->
            <!-- Order Status Table-->
            <!--Grid row-->
            @if(session('Order_Cancel_Status')==0)
                @if(session('Delivery_Status')!='pending')
                <p class=" animated rotateIn">
                <i class="fas fa-check-circle fa-3x"></i>
                </p>
                <h3>Order Completed Succesfully </h3>
                @endif
                    <div class="row wow fadeIn">
    
                        <!--Grid column-->
                        <div class="col-md-12 ">
    
                            <!--Card-->
                            <div class="card">
    
                            <!--Card content-->
                            <div class="card-body">
    
                                <!-- Table  -->
                                <table class="table table-hover">
                                     <tr>
                                        <th><i class="fas fa-shipping-fast "></i> Shipping  Status</th>
                                        <td>  
                                                    {{session('Shipping_Status')}}
    
                                              
                                                </td>
                                      </tr>
                                      <tr>
                                        <th><i class="fas fa-truck "></i> Delivery  Status:</th>
                                        <td>      {{session('Delivery_Status')}}
                                      
                                                </td>
                                      </tr>
                                      <tr> 
                                        <th><i class="fas fa-money-check "></i> Payment Status:</th>
                                        <td> 
                                        @if(session('p_status')=='pending')
                                         {{session('p_status')}}  <a href="/proceed_to_Payment/{{session('Order_id')}}" class="btaobtn btaobtn-success">Pay Now</a>
                                         @else
                                             {{session('p_status')}}
                                         @endif
                                               
                                                </td>
                                      </tr>
                                      <tr>
                                        <th><i class="fas fa-rupee-sign "></i> Payment Mode:</th>
                                        <td>{{session('paymentmode')}}</td>
                                      </tr>
                                
    
    
    
      
                                        </table>
                                        <!-- Table  -->
    
    
                            </div>
    
                            </div>
                            <!--/.Card-->
    
                        </div>
                        <!--Grid column-->
    
    
    
                    </div>
                    <!--Grid row-->
            @else
                <p class=" animated rotateIn"> 
                <i class="fas fa-ban fa-3x"></i>
                </p>
                <h3>This Order Was Cancelled  By You On {{session('Order_Cancelled_On')}}</h3>
            @endif
        </div>

            <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Close</a>
        </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Success-->