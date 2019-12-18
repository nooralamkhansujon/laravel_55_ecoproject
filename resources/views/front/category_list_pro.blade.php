@extends('front.master')

@section('title','Category Page')

@section('content')
<div class="album py-5 bg-light">
  <div class="container">
    <?php $category_name = DB::table('categories')->select('name')->where('id',$id_)->first(); ?>
    <h4 class="text-warning">
      Category:
        {{ ucfirst($category_name->name) }}
    </h4>
    <br>
    <div class="row">
     @forelse($category_products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" width="200px" height="200px" src="{{url('image',$product->image)}}" alt="Card image cap">
            <div class="card-body">
               <del class="text-danger">
                 $ {{ $product->pro_price }}
               </del>
               <span class="price text-warning float-right">
                  $ {{ $product->spl_price }}
               </span>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('productDetail',$product->id)}}" class="btn btn-sm btn-outline-secondary">
                       View Product
                    </a>
                    
                    <a href="{{route('cart.addItem',$product->id)}}" class="btn btn-sm btn-warning text-light">
                      Add To Cart <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      @empty 
            <h3> No Products </h3>
      @endforelse

    </div>
  </div>
</div>

@endsection 