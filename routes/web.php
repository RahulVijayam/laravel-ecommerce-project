<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::post('subscribe-news-letter','UserController@subscribe');
 
 Route::post('send-email','UserController@send_email');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/Help', function () {
    return view('Help');
});

Route::get('/Frequently-Asked-Questions', function () {
    return view('FAQS');
});
Route::get('/Shipping-and-Returns', function () {
    return view('S_AND_R');
});

Route::get('/Terms-and-Conditions', function () {
    return view('TermsandConditions');
});
Route::get('/Contact', function () {
    return view('Contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|---------------------------------------------------------------------------
|User  Routes Starts Here
|----------------------------------------------------------------------------
*/
Route::get('/user/dashboard', 'UserController@index')->middleware('auth');
Route::get('/Shop/{purl}', 'Product_Ordering_Controller\FrontEndController@index');

Route::get('/user/dashboard', 'UserController@index')->middleware('auth');

    Route::get('/dashboard', 'UserController@index')->middleware('auth');
    Route::get('/profile', 'UserController@open_profile')->middleware('auth');
    
    Route::post('/my-profile-update', 'UserController@update')->middleware('auth');
    Route::post('/update-password', 'UserController@updatepassword')->middleware('auth');
    
    Route::get('/Orders', 'UserController@open_orders')->middleware('auth');
    Route::get('/Payments', 'UserController@open_transactions')->middleware('auth');
    
Route::get('/Order-Status/{id}', 'Order_Status_Controller@Order_Status')->middleware('auth');

Route::get('/Order-Cancel/{id}', 'Order_Status_Controller@Order_Cancel')->middleware('auth');
    

/*
|---------------------------------------------------------------------------
|User   Routes Ends Here
|----------------------------------------------------------------------------
*/



/*
|---------------------------------------------------------------------------
|Admin MiddleWare  Routes Starts Here
|----------------------------------------------------------------------------
*/

Route::group(['middleware'=>['auth','isAdmin']],function ()
{
    Route::get('/admin-dash', 'Admin\LinksController@index');
    Route::get('/admin-all-users', 'Admin\LinksController@users');
    Route::get('admin/role-edit/{id}','Admin\LinksController@show_user_role_edit_view');
    Route::post('admin/role-update/{id}','Admin\UserController@updaterole');
    Route::get('admin/delete-user/{id}','Admin\UserController@deleteuser');
    Route::get('/admin-bin-users', 'Admin\LinksController@recycleusers');
    Route::get('admin/restore-user/{id}','Admin\UserController@restore');
    Route::get('admin/confirm-delete-user/{id}','Admin\UserController@confirmdelete');
    Route::get('/admin-products', 'Admin\LinksController@products');
    Route::get('/admin-add-product', 'Admin\LinksController@show_add_product_screen');
    Route::post('/admin-store-product','Admin\ProductController@Store');
    Route::get('/admin-product-edit/{id}','Admin\LinksController@ShowEditingScreen');
    Route::put('/admin-product-update/{id}','Admin\ProductController@update');    
    Route::get('admin-product-delete/{id}','Admin\ProductController@deleteproduct');
    Route::get('admin-bin-products','Admin\LinksController@recycleproducts');
    Route::get('admin-product-restore/{id}','Admin\ProductController@restore');
    Route::get('admin-product-delete-confirm/{id}','Admin\ProductController@confirmdelete');
    Route::get('admin-Orders','Admin\LinksController@showorders');
    Route::get('admin-Transactions','Admin\LinksController@showTransactions');
       Route::get('admin-news-letter','Admin\LinksController@showNewsLetter');
       
Route::get('admin-Order-Status/{id}', 'Admin\Order_Status_Controller@Order_Status');
  Route::post('admin-Update-Shipping-Status','Admin\Order_Status_Controller@Update_Shipping_Status');
  Route::post('admin-Update-Delivery-Status','Admin\Order_Status_Controller@Update_Delivery_Status');
  
  Route::post('admin-Update-Payment-Status','Admin\Order_Status_Controller@Update_Payment_Status');

  Route::post('admin-Update-paymentmode-Status','Admin\Order_Status_Controller@Update_paymentmode_Status');
 
Route::get('admin-Order-Cancel/{id}', 'Admin\Order_Status_Controller@Order_Cancel');

Route::get('admin-Order-Re-Cancel/{id}', 'Admin\Order_Status_Controller@Order_Re_Cancel');
    
});





/*
|---------------------------------------------------------------------------
|Cart  Routes Starts Here
|----------------------------------------------------------------------------*/

Route::get('cart','Product_Ordering_Controller\CartController@index');

Route::post('add-to-cart','Product_Ordering_Controller\CartController@addtocart'); 
Route::post('modify_quantity','Product_Ordering_Controller\CartController@alter_quantity'); 


Route::get('/load-cart-data','Product_Ordering_Controller\CartController@cartloadbyajax');
Route::post('delete-from-cart','Product_Ordering_Controller\CartController@remove');
Route::get('clear-cart','Product_Ordering_Controller\CartController@clear');

/*
|---------------------------------------------------------------------------
|Cart Routes Ends Here
|----------------------------------------------------------------------------*/

/*
|---------------------------------------------------------------------------
|Book Now Routes  Starts Here
|----------------------------------------------------------------------------*/

Route::get('checkout','Product_Ordering_Controller\booking@opencheckoutpage')->middleware('auth');

Route::get('Shipping_Payment_Screen','Product_Ordering_Controller\booking@Shipping_Payment_Screen')->middleware('auth');
Route::post('apply-promocode','Product_Ordering_Controller\booking@apply_promo_code')->middleware('auth');
Route::post('order-proceed','Product_Ordering_Controller\booking@order_proceed')->middleware('auth');

/*
|---------------------------------------------------------------------------
|Book Now Routes  Ends Here
|----------------------------------------------------------------------------*/


/*
|---------------------------------------------------------------------------
|Payment Routes  Starts Here
|----------------------------------------------------------------------------*/

Route::get('proceed_to_Payment/{O_Id}','Product_Ordering_Controller\payment@proceed_to_Payment')->middleware('auth');
 
Route::post("/payumoney/response","Product_Ordering_Controller\payment@payumoneyResponse")->middleware('auth');

Route::post("/payu/response","Product_Ordering_Controller\payment@payumoneyResponse")->middleware('auth');
/* The Below 2 routes are only for to handle unwanted access */
Route::get('/payumoney/response', function () {
    return view('welcome');
}); 
Route::get('payu/response', function () {
    return view('welcome');
}); 
 
/*
|---------------------------------------------------------------------------
|Payment Routes  Ends Here
|----------------------------------------------------------------------------*/
