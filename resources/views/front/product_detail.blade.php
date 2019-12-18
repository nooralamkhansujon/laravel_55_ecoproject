@extends('front.master')
@section('title','Detail Page')

@section('content')
  
   <div class="container ">
        <br><br>
       <div class="row mt-5">
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail">
                   <img src="{{url('image',$product->image)}}" class="card-img rounded-circle">
                </div>
            </div>

            <div class="col-md-5 offset-md-1">
                 <h2 class="text-warning">
                   {{ ucwords($product->pro_name) }}
                 </h2>
                 <h5 class="text-muted text-justify">{{ $product->pro_info }}</h5>
                 <h2 class="text-danger">$ {{ $product->spl_price }}</h2>
                 <p class="text-muted"><b>Available : 
                   {{ $product->stock }}</b> In stocks
                 </p>
                 <a href="{{route('cart.addItem',$product->id)}}" class="btn btn-sm btn-warning text-light">
                   Add To Cart <i class="fa fa-shopping-cart"></i>
                </a>
                 <br><br>
                 
                @php
                     $wishListData = DB::table('wishlist')
                     ->rightJoin('products','wishlist.pro_id','=','products.id')
                     ->where('wishlist.pro_id','=',$product->id)
                     ->get();
                     $count       = App\WishList::where(['pro_id' => $product->id ])->count();
                @endphp    

                @if($count == 0)
                     <form action="{{route('addToWishList')}}" method="POST" role="form">
                        {{ csrf_field() }}
                         <input type="hidden" name="pro_id" 
                        value="{{$product->id}}">
                         <button type="submit" class="btn btn-default">
                            Add To WishList 
                          </button>
                     </form>
                @else
                     <h3 style="color:green">Already Added to WishList 
                        <a class="text-muted" style="font-size:20px;" 
                            href="{{url('wishList')}}">
                            wishList
                        </a>
                     </h3>
                @endif 
            </div>
       </div>
   </div>
@endsection 