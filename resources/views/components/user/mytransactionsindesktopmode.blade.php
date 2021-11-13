<div class="container">
    <h3 class="py-2 px-2">My Transactions</h3>
<div class="row p-2">
   <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <table class="table table-striped table-bordered">
                       <thead>
                        <th>TXID</th>
                           <th>Order_Id</th>
                         
                           <th>Amount</th>
 
                           <th>Status</th>

                       </thead>
                       @php
                       $email= Auth::user()->email;
                       $Orders=App\Models\Transaction::where('email','=',$email)->get();
                     @endphp
                       <tbody>
                           @foreach ($Orders as $item)
                       <tr>

                         
                           <td>{{$item->TXNID}}</td>
                           <td>{{$item->Oder_No}}</td>

                           <td>{{$item->amount}}</td>
                           <td>{{$item->status}}</td>

                          




                       </tr>
                           @endforeach

                       </tbody>

                   </table>
               </div>
           </div>
   </div>
</div>
</div><br>