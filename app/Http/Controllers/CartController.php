<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
           $cartItems = Cart::content();  //this function from laravel shopping Cart plugin
           return view('cart.index',compact('cartItems'));
    }

    public function addItem($id)
    {
        $product       = Product::findOrFail($id);
        $cartItems     = Cart::content();
        $cart_id_array = [];
        foreach($cartItems as $cartItem)
        {
            $cart_id_array[] = $cartItem->id;
        }
    
        foreach($cart_id_array as $cartid)
        {
            if($cartid == $id)
            {
                return redirect()->back()->with('status',$product->pro_name.' is already added to  the Cart!');
            }
        }
        Cart::add($id,$product->pro_name,1,$product->pro_price,['img' =>$product->image,'stock' => $product->stock]);

        return redirect()->back();

        //function above from plugin 
        // Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);
    }

    public function update(Request $request,$rowId)
    {
           $qty = $request->qty;
           $proID = $request->proId;
           $product = Product::findOrFail($proID);
           $stock = $product->stock;
           
           if($qty < $stock)
           {
               Cart::update($rowId,$qty);
               return back()->with('status','Cart is updated');
           }
           else{
               return back()->with('error','Please  check your qty is more than product stock');
           }
    }

    public function remove($rowId)
    {
         Cart::remove($rowId);
         return back()->with('status',"Cart item is removed from Cart");
    }

   
}
