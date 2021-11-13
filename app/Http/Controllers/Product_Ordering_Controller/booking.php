<?php
namespace App\Http\Controllers\Product_Ordering_Controller;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller; 
    use App\Models\Products;
    use Illuminate\Support\Facades\Cookie;
    use Session;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Coupen_Code;
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;
    use Mail;


    class booking    extends Controller
    {
        public function opencheckoutpage()
        {
           
            return view('Product-Order-Screens.checkout');
        }
        public function Shipping_Payment_Screen()
        {
           
            return view('Product-Order-Screens.Shipping_Payment_Screen');
        }
        public function apply_promo_code(Request $request)
        {

                $promo_code = $request->input('promo_code');
               // $Coupen_Code=Coupen_Code::find($promo_code);
                
                
                if($Coupen=Coupen_Code::where('code',$promo_code)->first())
                {
                     
                    session(['promocode' => $Coupen->code]);
                    session(['discount' =>$Coupen->discount ]);
                    session(['message' =>'% Promo Code Applied Succesfully' ]);
                    session()->reflash();   
                  
                    
                    return back();
                }
                else
                {
                    //die 
                    
                return back()->with('invalid','You Entered Invalid Promo Code');
                }
            
        }
        public function  order_proceed(Request $request)
        {
              $validation =$request->validate([
                      'Payment_Method'=>'required',
                      'Door_No'=>'required|max:60',
                      'LandMark'=>'required|max:60',
                      'city'=>'required|max:60|regex:/^[a-zA-Z\s]*$/',
                      'state'=>'required|max:60|regex:/^[a-zA-Z\s]*$/',
                      'pincode'=>'required|digits_between:4,10',
                      'mno'=>'required|digits:10',
                    
                       'alternativemno'=>'nullable|digits:10',
                      'country'=>'required|max:30|regex:/^[a-zA-Z\s]*$/',
                // 'MobileNumber'=>'required|numeric',
                 
                ]);
                  print_r($validation);
               
                /* Delivery Details*/
                $address1=$request->input('Door_No');
                $address2=$request->input('LandMark');
                $city=$request->input('city');
                $state=$request->input('state');
                $pincode=$request->input('pincode');
                $mno=$request->input('mno');
                $alternativemno=$request->input('alternativemno');
                
                $country=$request->input('country');
                
               
                        

                $Delivery_Address=$address1.','.$address2.'<br>'.$city.','.$state.','.$country.'<br>'.$pincode.','.$mno.','.$alternativemno;
             /* Delivery Details*/
                $p_method=$request->input('Payment_Method');
            /* Order Details Starts Here*/
                if(session('cart'))
                {
                    $total=0;$count=0;$order_details='';$delivery_charges=0;                    
                    foreach (session('cart') as $id => $details) 
                    {
                        $count=$count +1 ;
                        $total += $details['Final_Price'] * $details['item_quantity'];
                        $order_details=$order_details.'<br>'.
                        ('Product Name:'.$details["item_name"].', Quantity: '.$details["item_quantity"].
                        '<br> Price:'.$details["Final_Price"]);
                        $delivery_charges = $delivery_charges + $details['delivery_charges'] ;
                    }
                
                }
                if(session('promocode'))
                {
                    $promocode=session('promocode');
                    $Amount = $total + $delivery_charges - session('discount') * $total / 100;
                }
                else
                {
                    $promocode=null;
                    $Amount = $total + $delivery_charges;
                }
                $O_Details=$order_details;
                $Email_Id=Auth::user()->email;
                $loginid=$Email_Id;
                $name=Auth::user()->name;
            /*Order Details Ends Here*/
                 $Order = new Order();
                 $Order->Customer_Emailid=$Email_Id;
                 $Order->Delivery_Address=$Delivery_Address;
                 $Order->Order_Details=$O_Details;
                 $Order->Coupen_Code=$promocode;
                 $Order->Amount=$Amount;
                 $Order->paymentmode=$p_method;
                 $Order->save();       
                 $id=$Order->id;
                
                 if($p_method=='Online')
                 {
                    return redirect("proceed_to_Payment/$id");
                 }
                 else
                 {
                   
    	               
    	                $welcomemessage='Hello '.$name.'<br>';
    	                $emailbody='Your Order Was Placed Successfully<br>
    	                <p>Thank you for your order. We’ll send a confirmation when your order ships. Your estimated delivery date is 3-5 working days. If you would like to view the status of your order or make any changes to it, please visit Your Orders on <a href="https://www.gainaloe.com">Gainaloe.com</a></p>
    	                <h4>Order Details: </h4><p> Order No:'.$id.$O_Details.'</p>
    	                 <p><strong>Delivery Address:</strong>
    	               '.$Delivery_Address.'</p>
    	                <p> <strong>Total Amount:</strong>
    	                '.$Amount.'</p>
    	                 <p><strong>Payment Method:</strong>'.$p_method.'</p>';
    	                $emailcontent=array(
    	                    'WelcomeMessage'=>$welcomemessage,
    	                    'emailBody'=>$emailbody
    	                   
    	                    );
    	                    Mail::send(array('html' => 'emails.order_email'), $emailcontent, function($message) use
    	                    ($loginid, $name,$id)
    	                    {
    	                        $message->to($loginid, $name)->subject
    	                        ('Your Gainaloe.com order '.$id.' is Confirmed');
    	                        $message->from('codetalentum@btao.in','Gainaloe');
    	                        
    	                    });
                    
                            Session::forget('cart');
                            Session::forget('discount');
                            Session::forget('promocode');
                            session()->flash('success', 'Session data  is Cleared');
                              
                  
                    return redirect("/Orders")->with('status','Order Placed Succesfully!');                  
                 }
                
        }
       
        
        
    }