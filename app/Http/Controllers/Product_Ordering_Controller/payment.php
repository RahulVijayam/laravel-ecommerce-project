<?php
namespace App\Http\Controllers\Product_Ordering_Controller;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller; 
    use App\Models\Products;
    use App\User;
    use Illuminate\Support\Facades\Cookie;
    use Session;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Coupen_Code;
    use App\Models\Order;
    use App\Models\Transaction;
    use Illuminate\Support\Facades\Auth;
    use Softon\Indipay\Facades\Indipay;
     
    use Mail;

    


    class payment    extends Controller
    {
        public function   proceed_to_Payment(Request $request,$id)
        {
            $Order=Order::where('id','=',$id)->first();
         
           $amount=$Order->Amount;
            // $amount=5;
            $email=$Order->Customer_Emailid ; 
            $id=$Order->id;
           
            
            $parameters = [
                'txnid' => substr(hash('sha256', mt_rand() . microtime()), 0, 20) ,
                'amount' => $amount,
                'email' => $email,   
                'udf1'=> $id,                   
                'phone' => '22',
                'firstname'=> 'd',
                'productinfo' => 'sd',
                'key'=>'6pDG59IB',
                'service_provider'=>'payu_paisa',
                'curl'=>url('payu/response')
                
            ];
            $order = Indipay::prepare($parameters);
            return Indipay::process($order);
        }
        public function payumoneyResponse(Request $request)
        {
                $response= Indipay::response($request);
                $status=$response["status"];
                $unmappedstatus=$response["unmappedstatus"];
                $amount=$response["amount"];
                $O_id=$response["udf1"];
                $email=$response["email"];             
                $txnid=$response["txnid"];
                $Order=Order::find($O_id)->first();
                 $Order_Details=$Order->Order_Details;
                $Delivery_Address=$Order->Delivery_Address;
             $p_method=$Order->paymentmode;
            $Amount=$Order->Amount;
                if($status=="success" && $unmappedstatus=='captured')
                {
                       
                   
                    $Order->p_status="success";
                    $Order->p_status_Updated_By="Automatic";
                    $Order->update();
                    $email=$Order->Customer_Emailid;      
                    $Transaction = new Transaction();
                    $Transaction->TXNID=$txnid;
                    $Transaction->Oder_No=$O_id;
                    $Transaction->email=$email;
                    $Transaction->amount=$amount;
                    $Transaction->status=$status;
                    $Transaction->save();
                    
                           
                            $User=User::where('email','=',$email)->first();
                            $loginid=$email;
                            $name=$User->name;
                            //You Paid amount of  '.$amount.' INR  for the following Order
        	                $welcomemessage='Hello '.$name.'';
        	                $emailbody='<p>Your Payment '.$amount.' towards Order '.$O_id. 'is Successfully Paid .
Your Order is Confirmed. Estimated Delivery 3-5 Working days</p>
    	                 <br>
        	                <h4>Order Details: </h4><p> Order No:'.$O_id.$Order_Details.'</p>
        	                 <p><strong>Delivery Address:</strong>
        	               '.$Delivery_Address.'</p>
        	                <p> <strong>Total Amount:</strong>
        	                '.$Amount.'</p>
        	                 <p><strong>Payment Method:</strong>'.$p_method.'</p>
        	                  <p><strong>Payment Status:</strong>'.$status.'</p>';
        	                $emailcontent=array(
        	                    'WelcomeMessage'=>$welcomemessage,
        	                    'emailBody'=>$emailbody
        	                   
        	                    );
        	                    Mail::send(array('html' => 'emails.order_email'), $emailcontent, function($message) use
        	                    ($loginid, $name,$O_id)
        	                    {
        	                        $message->to($loginid, $name)->subject
        	                        ('Your Gainaloe.com Order Payment '.$O_id.' is Successfully Paid');
        	                        $message->from('codetalentum@btao.in','Gainaloe');
        	                        
        	                    });
                        
                    Session::forget('cart');
                    Session::forget('discount');
                    Session::forget('promocode');
                    Session::forget('response');
                    Session::forget('O_id');
                    session()->flash('success', 'Session data  is Cleared');
                    
                    
                    return redirect("/Orders")->with('status','You Paid Succesfully');  


                }
                else
                {
                    $Order=Order::find($O_id)->first();
                    $email=$Order->Customer_Emailid; 
                    $Transaction = new Transaction();
                    $Transaction->TXNID=$txnid;
                    $Transaction->Oder_No=$O_id;
                    $Transaction->email=$email;
                    $Transaction->amount=$amount;
                    $Transaction->status=$status;
                      /* 
                      date_default_timezone_set('Asia/Kolkata');
                    $date=date("l jS \of F Y h:i:s A");
                    $Transaction->created_at=$date;
                    */
                    $Transaction->save();
                            $User=User::where('email','=',$email)->first();
                            $loginid=$email;
                            $name=$User->name;
                      $welcomemessage='Hello '.$name.'';
        	                $emailbody=' <p>Your Payment '.$amount.' towards Order '.$O_id. 'is failed. <br>
        	                You Can Try Again by using the following link: <br>
        	                <a href="https://www.gainaloe.com/proceed_to_Payment/'.$O_id.'">https://www.gainaloe.com/proceed_to_Payment/'.$O_id.'</a></p>
        	                <h4>Order Details: </h4><p> Order No:'.$O_id.$Order_Details.'</p>
        	                 <p><strong>Delivery Address:</strong>
        	               '.$Delivery_Address.'</p>
        	                <p> <strong>Total Amount:</strong>
        	                '.$Amount.'</p>
        	                 <p><strong>Payment Method:</strong>'.$p_method.'</p>
        	                  <p><strong>Payment Status:</strong>'.$status.'</p>';
        	                $emailcontent=array(
        	                    'WelcomeMessage'=>$welcomemessage,
        	                    'emailBody'=>$emailbody
        	                   
        	                    );
        	                    Mail::send(array('html' => 'emails.order_email'), $emailcontent, function($message) use
        	                    ($loginid, $name,$O_id)
        	                    {
        	                        $message->to($loginid, $name)->subject
        	                        ('Your Gainaloe Order '.$O_id.' Payment is Failed');
        	                        $message->from('codetalentum@btao.in','Gainaloe');
        	                        
        	                    });
                    Session::forget('cart');
                    Session::forget('discount');
                    Session::forget('promocode');
                    session()->flash('success', 'Session data  is Cleared');

                    session(['payment_failure' =>"Your Payment Failed" ]);
                    session(['O_id' =>$O_id ]);
                    session()->reflash();   
                    
                    return view("Product-Order-Screens.response")->with('payment_failure','You Payment was Unsuccesfull');  

                }       
        }
           
       
    }