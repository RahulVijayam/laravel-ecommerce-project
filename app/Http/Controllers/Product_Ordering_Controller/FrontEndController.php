<?php
namespace App\Http\Controllers\Product_Ordering_Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Products;

class FrontEndController extends Controller
{
    public function index(Request $request, $purl)
    {
        
        $Product=Products::where('url','=',$purl)->first();
         return view('Product-Order-Screens.Product_Page')->with('Product',$Product);
    }
}