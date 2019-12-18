@extends('front.master')
@section('title','Wishlist Page')

@section('content')
   
<div class="container"> <br>
    <div class="row">
       <div class="col-md-12">
            <h3 class="text-warning" style="text-transform:capitalize;" align="center">
                WishList Products 
            </h3>
        </div>
         @if(session()->has('msg'))
            <div class=" col-md-12 alert alert-danger">
                {{session()->get('msg')}}
            </div>
         @endif 
        <br>
        @if($products->isEmpty())
            <h4 class="col-md-8 offset-md-3 mt-3 display-5 text-warning">
               Sorry, Products Not Found
            </h4>
        @else
            
           @foreach($products as $product)
              <div class="col-md-4 col-sm-6 mt-3">
                  <div class="text-center badge badge-light">
                        <a href="{{route('productDetail',$product->id)}}">
                        <img src="{{url('image',$product->image)}}" width="200px" height="200px" alt="{{$product->pro_name}}">
                        </a>
                        <h3 class="text-success">
                          $ <span class="text-secondary">{{ $product->pro_price }}</span>
                        </h3>
                        <p>
                        <a class="text-primary" href="{{route('productDetail',$product->id)}}">
                            {{ $product->pro_name }}
                        </a>
                        </p>
                        <a href="{{route('cart.addItem',$product->id)}}" class="btn btn-sm btn-warning text-light">
                          <i class="fa fa-shopping-cart"></i> 
                           Add To Cart 
                        </a>
                        <a href="{{route('removeWishList',$product->id)}}" style="color:red;" class="btn btn-default btn-block">
                        <i class="fa fa-minus-square"></i>
                        Remove from wishlist
                      </a>
                   </div>
                </div>
            @endforeach 
        @endif 
     </div>
</div>
@endsection 