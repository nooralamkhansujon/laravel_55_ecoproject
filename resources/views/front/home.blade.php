@extends('front.master')
@section('title','Home Page')

@section('content')
<main role="main">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
   </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('dist/img/carousel-1.jpg')}}"  height="400px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('dist/img/carousel-2.jpg')}}" height="400px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('dist/img/carousel-3.jpg')}}" height="400px" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


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
               <del class="text-danger">$ {{ $product->pro_price }}</del>
               <span class="price text-warning float-right">
                  $ {{ $product->spl_price }}
               </span>

              <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{route('productDetail',$product->id)}}" class="btn btn-sm btn-outline-secondary">View Product</a>
                    <a href="{{route('cart.addItem',$product->id)}}" class="btn btn-sm btn-warning text-light">
                      <i class="fa fa-shopping-cart"></i>   
                       Add To Cart 
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