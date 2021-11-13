<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function Store(Request $request)
    {
           $products = new Products();

           $lastrecord = DB::table('products')->latest()->first();
           if($lastrecord)
           {
               $id= $lastrecord->id+1;


           }
           else
           {
               $id= $lastrecord +1;
           }
           $products->id= $id;
           $products->name= $request->input('name'); 
           $products->url= $request->input('url');
           $products->description= $request->input('small_description');
           $products->price= $request->input('price');
          
           $products->discount= $request->input('Discount');
           $products->priority= $request->input('priority');
   
           $products->title= $request->input('meta_title');
           $products->meta_description= $request->input('meta_description');
           $products->keywords= $request->input('meta_keyword');

           $products->rating= $request->input('rating');
           
           $products->delivery_charges= $request->input('delivery_charges');
           $products->additional_info= $request->input('additional_info');


         //  $products->new_arrival_products= $request->input('new_arrival_products')==true ? '1':'0';
        //  $products->featured_products= $request->input('featured_products')==true ? '1':'0';
       //  $products->popular_products= $request->input('popular_products')==true ? '1':'0';
      //  $products->offer_products= $request->input('offer_products')==true ? '1':'0';
           $products->status= $request->input('status')==true ? '1':'0';
           $image1 =$request->file('image1');
           if($request->hasfile('image1'))
           {
               $extension=$image1->getClientOriginalExtension();
               $product_Image_name=$products->url.'-1-.'.$extension;
               $image1->move('Uploads/Products/',$product_Image_name);
               $products->image1=$product_Image_name;

           }
           $image2 =$request->file('image2');
           if($request->hasfile('image2'))
           {
               $extension=$image2->getClientOriginalExtension();
               $product_Image_name=$products->url.'-2-.'.$extension;
               $image2->move('Uploads/Products/',$product_Image_name);
               $products->image2=$product_Image_name;

           }
           $image3 =$request->file('image3');
           if($request->hasfile('image3'))
           {
               $extension=$image3->getClientOriginalExtension();
               $product_Image_name=$products->url.'-3-.'.$extension;
               $image3->move('Uploads/Products/',$product_Image_name);
               $products->image3=$product_Image_name;

           }
           $image4 =$request->file('image4');
           if($request->hasfile('image4'))
           {
               $extension=$image4->getClientOriginalExtension();
               $product_Image_name=$products->url.'-4-.'.$extension;
               $image4->move('Uploads/Products/',$product_Image_name);
               $products->image4=$product_Image_name;

           }
           $products->save();
           return redirect()->back()->with('status','Product Data Added Successfully');

    }
    public function update(Request $request, $id)
    {
        $products=Products::find($id);
        $products->name= $request->input('name'); 
        $products->url= $request->input('url');
        $products->description= $request->input('small_description');
        $products->price= $request->input('price');
        $products->discount= $request->input('Discount');
        $products->rating= $request->input('rating');
        $products->priority= $request->input('priority');


         $products->title= $request->input('meta_title');
        $products->meta_description= $request->input('meta_description');
        $products->keywords= $request->input('meta_keyword');

        $products->status= $request->input('status')==true ? '1':'0';
        
           $products->delivery_charges= $request->input('delivery_charges');
           $products->additional_info= $request->input('additional_info');

        $image1 =$request->file('image1');
        if($request->hasfile('image1'))
        {
            $destination='Uploads/Products/'.$products->image1;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $extension=$image1->getClientOriginalExtension();
            $product_Image_name=$products->url.'-1-.'.$extension;
            $image1->move('Uploads/Products/',$product_Image_name);
            $products->image1=$product_Image_name;

        }


        $image2 =$request->file('image2');
        if($request->hasfile('image2'))
        {
            $destination='Uploads/Products/'.$products->image2;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $extension=$image2->getClientOriginalExtension();
            $product_Image_name=$products->url.'-2-.'.$extension;
            $image2->move('Uploads/Products/',$product_Image_name);
            $products->image2=$product_Image_name;

        }
        $image3 =$request->file('image3');
        if($request->hasfile('image3'))
        {
            $destination='Uploads/Products/'.$products->image3;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $extension=$image3->getClientOriginalExtension();
            $product_Image_name=$products->url.'-3-.'.$extension;
            $image3->move('Uploads/Products/',$product_Image_name);
            $products->image3=$product_Image_name;

        }

        $image4 =$request->file('image4');
        if($request->hasfile('image4'))
        {
            $destination='Uploads/Products/'.$products->image4;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $extension=$image4->getClientOriginalExtension();
            $product_Image_name=$products->url.'-4-.'.$extension;
            $image4->move('Uploads/Products/',$product_Image_name);
            $products->image4=$product_Image_name;

        }
        $products->save();
        return redirect()->back()->with('status','Product Data Updated Successfully Successfully');   
    }
    public function deleteproduct(Request $request, $id)
    {
        $Products=Products::find($id);
 
        $Products->status = 2;

        //Status 1 is active user
        // Status 2 is the user present in the recycle bin (inactive_User)
        $Products->update();
        return redirect()->back()->with('status', 'Products Moved to Recycle Bin');

   
    }
    public function restore(Request $request, $id)
    {
        $Products=Products::find($id);
 
        $Products->status = 1;

        //Status 1 is active user
        // Status 2 is the user present in the recycle bin (inactive_User)
        $Products->update();
        return redirect()->back()->with('status', 'Products Restored Succesfully');

   
    }
    public function confirmdelete(Request $request, $id)
    {
    
            $delete = Products::find($id);
            $delete->delete();
            return redirect()->back()->with('status','Product Permanently Deleted  Successfully !!');
    }
}