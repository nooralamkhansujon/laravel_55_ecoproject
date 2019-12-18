@extends('front.master')
@section('title','Profile Page')

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
             <div class="card-header bg-warning text-light">Profile Menu</div>
             <div class="card-body text-secondary">
                 @include('profile.menu')
             </div>
          </div>
          
          

        </div>

        <div class="col-md-8">
            <ol class="breadcrumb">
                <li>
                    <h3>Welcome 
                        <span style="color:green;">
                            {{ ucwords(Auth::user()->name) }} 
                        </span>
                    </h3>
                </li>
                <table border="0" align="center">
                  <tr>
                    <td>
                      <a href="{{route('orders')}}" class="btn btn-success">My orders</a>
                    </td>
                    <td>
                      <a href="{{route('address')}}" class="btn btn-success">My Address</a>
                    </td>
                    <td>
                      <a href="{{url('password')}}" class="btn btn-success">Change Password</a>
                    </td>
                  </tr>
                </table>
            </ol>
          </div>
      </div>
  </div>
</section>
@endsection 