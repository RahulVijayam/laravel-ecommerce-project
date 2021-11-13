<div  id="events" class="container slideanim" >
    <h2 align="center" class="h1-responsive font-weight-bold " style="font-family: 'Josefin Sans', sans-serif;color:#330033;margin-top:-30px;">Transaction History</h2> 
    <div class="row d-flex justify-content-center" style="margin-top:-30px;"> 
                        @php
                            $email= Auth::user()->email;
                           $Orders=App\Models\Transaction::where('email','=',$email)->get();
                        @endphp
                        
                        @foreach ($Orders as $item)
                            <div class="col-md-4">
                                <div class="card-body text-white text-center py-5 px-5 my-5" style="background:hsl(252, 100%, 4%);border-radius:20px;">
                    
                                  <h3 style="color:yellow;font-family: Righteous, cursive;">
                                         <strong>OID: {{$item->Oder_No}}</strong>
                                             <hr class="hr-light">
                                        </h3>
                                        
                                                
                                            
                                                 <h4 style="color:white;font-family: 'Balsamiq Sans', cursive;" >
                             <strong>TXID: </strong><?php echo $item->TXNID?>
                            </h4>
                          
                     
                                      
                                    <p>   <strong>Amount: </strong><?php echo $item->amount?> <br>
                                    <strong>Payment Status: </strong>{{$item->status}} </p>
                        
                                              
                                    </div>
                                    </div>
                        @endforeach
    </div>
                
</div> 