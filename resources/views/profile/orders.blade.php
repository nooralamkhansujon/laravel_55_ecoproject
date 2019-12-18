@extends('front.master')
@section('title','Order Page')

@section('content')
<style>
  table,td{
     padding:10px;
  }
</style>

<section id="cart_items">
  <div class="container"> 
      <br>
    <div class="row mt-3" >
        <div class="col-md-4 well well-sm">
            <div class="card border-secondary mb-3" style="max-width:18rem;">
                <div class="card-header bg-warning text-light" style="font-weight:bold;">Profile Menu</div>
                <div class="card-body text-secondary">
                    @include('profile.menu')
                </div>
            </div>

        </div>

        <div class="col-md-8">
               <h3 class="text-warning"><span style="color:green;">
                 {{ucwords(Auth::user()->name)}}</span>, Your Orders
               </h3>
               <table class="table table-hover">
                    <thead>
                        <tr class="bg-info text-light">
                           <th>Date</th>
                           <th>Product Name</th>
                           <th>Product Code</th>
                           <th>Order Total</th>
                           <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                           <tr class="text-secondary">
                               <td >{{ $order->created_at }}</td>
                               <td>{{ ucwords($order->pro_name) }}</td>
                               <td>{{ $order->pro_code }}</td>
                               <td>{{ $order->total }}</td>
                               <td>{{ $order->status }}</td>
                           </tr>
                        @endforeach     
                    </tbody>
               </table>
        </div>
      </div>
  </div>
</section>
@endsection 