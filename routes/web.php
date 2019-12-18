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

/* Front End Location */
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop','HomeController@shop')->name('shop');
Route::get('category/{id}','HomeController@showCates');
Route::get('/contact',function(){
   return view('front.contact');
});


Route::get('/productDetail/{id}','HomeController@detailPro')->name('productDetail');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/addItem/{id}','CartController@addItem')->name('cart.addItem');
Route::put('/cart/update/{rowId}','CartController@update')->name('cart.update');
Route::get('/cart/remove/{rowId}','CartController@remove')->name('cart.remove');
Route::get('/checkout','CheckoutController@index')->name('checkout.index');

// profile must be log in first 
Route::middleware(['auth'])->group(function(){
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::get('/orders','ProfileController@orders')->name('orders'); 
    Route::get('/address','ProfileController@address')->name('address'); 
    Route::put('/updateAddress','ProfileController@updateAddress')->name('updateAddress'); 
    Route::get('/password','ProfileController@password')->name('password'); 
    Route::put('/updatePassword','ProfileController@updatePassword')->name('updatePassword'); 
    Route::get('wishList','HomeController@view_wishlist')->name('viewWishList');
    Route::post('addToWishList','HomeController@addToWishList')->name('addToWishList');

    Route::get('removeWishList/{id}','HomeController@removeWishList')->name('removeWishList');
});


// end of front end loaction 

/* Admin Location */
Auth::routes();


Route::name('admin.')->prefix('admin')->middleware(['auth','admin'])->group(function(){

    Route::get('/',function(){
        return view('admin.index');
    })->name('index');
    Route::resource('/product','ProductController');
    Route::resource('/category','CategoriesController');

    //for shipping Address must be login so will replace code here
    Route::put('/formvalidate','CheckoutController@address');
    
});
