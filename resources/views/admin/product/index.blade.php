@extends('admin.master')
@section('title','List Products')


@section('content')
   
   <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
     <br></br>
         <h3 class="text-warning">Products</h3>
         <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                   <tr>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Delete</th>
                   </tr>
                </thead>

                <tbody>

                  @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{url('image',$product->image)}}" width="80px"/>
                        </td>
                        <td>
                           {{ $product->pro_name }}
                        </td>
                        <td>$ {{ $product->pro_price }}</td>
                        <td>
                           <form action="{{route('admin.product.destroy',$product->id)}}" method="POST">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                           </form>
                        </td>
                    </tr>
                  @endforeach 



                </tbody>

             </table>
         </div>
   </main>
@endsection