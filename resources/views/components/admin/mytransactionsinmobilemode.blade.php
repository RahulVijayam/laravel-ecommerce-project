<div class="container"> 
    <h3 class="py-2 px-5">My Payments</h3>
   <div class="row px-1">
       
       <div class="col-md-12">
              
                        @php
                            $email= Auth::user()->email;
                           $Orders=App\Models\Transaction::paginate(10);
                        @endphp
                        
                        @foreach ($Orders as $item)
                            <br>
                            <div class="card ">
                            <div class=" py-3">
                                <ul style="list-style:none;width:100%;">
                                    <li> <strong>Order Id: </strong>  {{$item->Oder_No}}</li>
                                        <li><strong>TXID: </strong><?php echo $item->TXNID?></li>
                                        
                                        <li><strong>Amount: </strong><?php echo $item->amount?></li>
                                    
                                        <li><strong>Payment Status: </strong>{{$item->Status}}</li>
                                </ul>
                                    
                                
                                    
                            </div>
                        </div>
                        @endforeach
   
                         
                         
   
                     
                   
       </div>
   </div>
   </div>
   <br>  {{ $Orders->links()}}