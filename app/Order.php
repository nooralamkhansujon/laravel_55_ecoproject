<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Cart;
use Auth;
class Order extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['status','total','user_id'];

    public function orderFields()
    {
        //order can order many product from Product Table 
        return $this->belongsToMany(Product::class,'orders_product','orders_id','product_id')->withPivot('qty','tax','total');
    }
   
    public static function createOrder()
    {
        $user      = Auth::user();
        $order     = $user->orders()->create(['total' => Cart::total(),'status' =>'pending']); 
        $cartItems = Cart::content();
       
        //this will add cart product to the cart orders_product table 
        foreach($cartItems as $cartItem)
        {
            $order->orderFields()->attach($cartItem->id,[ 
                'qty'   => $cartItem->qty,
                'tax'   => Cart::tax(),
                'total' => ($cartItem->qty * $cartItem->price)
            ]);
        }
    }

    
}
