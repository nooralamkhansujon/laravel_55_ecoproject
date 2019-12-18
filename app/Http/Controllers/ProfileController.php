<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
class ProfileController extends Controller
{
    
    public function index()
    {
        return view('profile.index');
    }

    public function orders()
    {
        $user_id  = Auth::user()->id;
        $orders   = DB::table('orders_product')
                    ->leftJoin('products','products.id','=','orders_product.product_id')
                    ->leftJoin('orders','orders.id','=','orders_product.orders_id')
                    ->where('orders.user_id','=',$user_id)
                    ->select('orders.created_at','products.pro_name','products.pro_code','orders.total','orders.status')->get();
        return view('profile.orders',compact('orders'));
    }

    public function address()
    {
        $user_id = Auth::user()->id;
        $address = DB::table('address')->where('user_id',$user_id)
                    ->limit(1)->get();
        return view('profile.address',compact('address'));
        
    }
    
    public function updateAddress(Request $request)
    {
        // dd($request->except('_token'));
        $this->validate($request,[
                'fullname' => 'required|min:5|max:35',
                'pincode'  =>  'required|numeric',
                'city'     => 'required|min:5|max:25',
                'state'    => 'required|min:5|max:25',
                'country'  => 'required' 
        ]);
        $userid = Auth::user()->id;
        DB::table('address')->where('user_id',$userid)->update($request->except('_token'));

        return back()->with('msg','Your address has been update');
    }

    public function password()
    {
         return view('profile.updatepassword');
    }

    public function updatePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $this->validate($request,[
            'oldPassword' => 'required',
            'newPassword' => 'required'
        ]);
    
        if(!Hash::check($oldPassword,Auth::user()->password))
        {
            return back()->with('msg','The specified password does not match to Database password');
        }
        else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save();//update password to user table
            return back()->with('msg','Password has been updated');
        }
    }
}
