<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Address;
use App\Order;

class CheckoutController extends Controller
{
    
    public function index()
    {
        //check out must be login 
        if(Auth::check())
        {
            $cartItems = Cart::content();
            return view('cart.checkout',compact('cartItems'));
        }
        else{
            return redirect()->route('login');
        }

    }
    public function address(Request $request)
    {

        $this->validate($request,[
            'fullname' => 'required|min:5|max:35',
            'pincode'  => 'required|numeric',
            'city'     => 'required|min:5|max:35',
            'state'    => 'required|min:5|max:35',
            'country' => 'required'
        ]);

        $data = array(
            'fullname'      => $request->fullname,
            'state'         => $request->state,
            'city'          => $request->city,
            'country'       => $request->country,
            'payment_type'  => $request->payment_type,
            'user_id'       => Auth::user()->id,
            'pincode'       => $request->pincode,
        );
        Address::create($data);
        
        //after insert Data to Address Table we will insert data to Order table also
        Order::createOrder();
        Cart::destroy();
        return view('profile.thankyou');
    }

    // public function 

    
}
