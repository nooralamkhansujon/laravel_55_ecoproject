@extends('front.master')

@section('title','Shop Page')

@section('content')
     
<main role="main">


<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Khmer Online Shopping</h1>
        <p class="lead text-muted">
            <a href="#" class="btn btn-primary">vdoforkhmer.com</a>
            <a href="#" class="btn btn-secondary">Khmerdaily.org</a>
        </p>
    </div>
</section>

 <div class="album py-5 bg-light">
    <div class="container">
           @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" width="200px" height="200px" src="{{url('image',$product->image)}}" alt="Card image cap">
                    <div class="card-body">

                    <p class="card-text">{{$product->pro_name}}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="{{route('productDetail',$product->id)}}" class="btn btn-sm btn-outline-secondary">
                           View Product
                        </a>
                        <a href="{{route('cart.addItem',$product->id)}}" class="btn btn-sm btn-warning text-light">
                          <i class="fa fa-shopping-cart"></i>   Add To Cart 
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

</main>
@endsection 