<?php
namespace App\Http\Controllers;

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
    use App\User;

class Order_Status_Controller extends Controller
{
    public function Order_Status(Request $request, $id)
     {
        $Order_Status= Order::find($id);
        return redirect()->back()->with('Order_Status',$Order_Status)
        ->with('Order_id', $Order_Status->id)
        ->with('Shipping_Status', $Order_Status->Shipping_Status)
        ->with('Delivery_Status', $Order_Status->Delivery_Status)
        ->with('p_status', $Order_Status->p_status)
        ->with('paymentmode', $Order_Status->paymentmode)
        
        ->with('Order_Cancelled_On', $Order_Status->Order_Cancelled_On)
        
        ->with('Order_Cancel_Status', $Order_Status->Order_Cancel_Status);
    }
     public function Order_Cancel(Request $request,$id)
     { 
        $Orders=Order::find($id);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
         
        $Order_Cancelled_On =  date('d-m-Y h:i:s');
        $Orders->Order_Cancel_Status=1;
        $Orders->Order_Cancelled_On=$Order_Cancelled_On;
      #  $Auth = Auth::user();

       # $Orders->D_Status_Updated_By=$Auth->email;
        $Orders->update();
         /* Email Alert Starts Here*/
         $email=$Orders->Customer_Emailid;
         $Order_Details=$Orders->Order_Details;
                $Delivery_Address=$Orders->Delivery_Address;
             $p_method=$Orders->paymentmode;
            $Amount=$Orders->Amount;
            $status=$Orders->p_status;
                            $User=User::where('email','=',$email)->first();
                            $loginid=$email;
                            $name=$User->name;
                            
        	                $welcomemessage='Hello '.$name.'';
        	                $emailbody='The Following Order is Cancelled Succesfully <br>
        	                <h4>Order Details: </h4><p> Order No:'.$id.$Order_Details.'</p>
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
        	                    ($loginid, $name,$id)
        	                    {
        	                        $message->to($loginid, $name)->subject
        	                        ('Hey'.$name.' Your  Order No: '.$id.' Was Cancelled Succesfully');
        	                        $message->from('codetalentum@btao.in','CodeTalentum');
        	                        
        	                    });
           /* Email Alert Ends Here*/
        return redirect()->back()->with('status','Order Cancelled Succesfully');

     }
}