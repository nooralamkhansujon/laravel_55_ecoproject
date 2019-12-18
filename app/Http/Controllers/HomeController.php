<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\WishList;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        //no need to login for Home Controllerr 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products  = Product::all();
        return view('front.home',compact('products'));
    }

    public function shop()
    {
        $products  = Product::all();
        return view('front.shop',compact('products'));
    }

    public function showCates($id)
    {
        $category_products = Product::where('category_id',$id)->get();
        $id_ = $id;
        return view('front.category_list_pro',compact('category_products','id_'));
    }

    public function detailPro($id)
    {
         $product = Product::findOrFail($id);
         return view('front.product_detail',compact('product'));
    }

    public function view_wishlist()
    {
        $products = DB::table('wishlist')
                      ->leftJoin('products','wishlist.pro_id','=','products.id')
                      ->where('wishlist.user_id','=',auth()->user()->id)
                      ->get();
        return view('front.wishlist',compact('products'));           
    }

    public function addToWishList(Request $request){
         
          
           //check if product already added to the wishList table 
           $wishList  = WishList::find($request->pro_id);
           if($wishList)
           {
              return redirect()->back();
           }
           $wishList          = new WishList();
           $wishList->user_id = Auth::user()->id;
           $wishList->pro_id  = $request->pro_id;
           $wishList->save();
           $product           = Product::find($request->pro_id);
           
           return view('front.product_detail',compact('product'));        
    }

    public function removeWishList($id)
    {
        DB::table('wishlist')
              ->where('pro_id','=',$id)
              ->delete();
        return back()->with('msg','Item Removed from wishlist');
    }




}
