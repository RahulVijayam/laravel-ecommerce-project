<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User;
use App\Models\Products;
use App\Models\NewsLetter;
class LinksController extends Controller
{
    
    public function index()
    {
         return view('dashboards.admin.index');
    }
    public function users()
    {   
        //Status 0 is Hide user
        //Status 1 is active user
        // Status 2 is the user present in the recycle bin 
        $users=User::where('status','=','1')->paginate(10);
         return view('dashboards.admin.users')->with('users', $users);
    }
    public function show_user_role_edit_view($id)
    {
        $userroles=User::find($id);
        return view('dashboards.admin.edituserrole')->with('userroles', $userroles);
    }
    public function recycleusers()
    {
        $users=User::where('status','=','2')->paginate(10);
         return view('dashboards.admin.usersrecyclebin')->with('users', $users);
    }
    public function products()
    {
        $Products=Products::where('status','!=','2')->paginate(5);
         return view('dashboards.admin.Products.index')->with('Products', $Products);
    }
    public function show_add_product_screen()
    {
        return view('dashboards.admin.Products.add');

    }
    public function  ShowEditingScreen($id)
    {
       $Products = Products::find($id); 

       return view("dashboards.admin.Products.edit")->with('Products',$Products);
    }
    public function recycleproducts()
    {
        $Products=Products::where('status','=','2')->paginate(10);
         return view('dashboards.admin.Products.bin')->with('Products', $Products);
    }

    public function     showorders()
    {
        return view('dashboards.admin.orders');
    }
    public function     showTransactions()
    {
        return view('dashboards.admin.Transactions');
    }
     public function     showNewsLetter()
    {
        $NewsLetter=NewsLetter::select('email','name')->distinct('name')->paginate(10);
        return view('dashboards.admin.NewsLetter')->with('NewsLetter', $NewsLetter);
    }
    
    
    
    
}