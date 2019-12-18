@extends('front.master')
@section('title','Address Page')

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
                 {{ucwords(Auth::user()->name)}}</span>, Your Address
               </h3>
               <hr>
              <div class="container">
              @if(session()->has('msg'))
                  <div class="alert alert-info">
                    {{ session()->get('msg') }}
                  </div>
              @endif 
                  <form action="{{route('updateAddress')}}" method="POST" role="form">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      @foreach($address as $value)
                        <div class="form-group {{$errors->has('fullname')? 'has-error':''}}">
                            <label for="fullname" class="text-muted font-weight-bold">Full Name</label>
                            <input type="text" class="form-control" name="fullname" value="{{$value->fullname}}" id="fullname" placeholder="Full Name">
                            <span class="text-danger">{{$errors->first('fullname')}}
                            </span>
                        </div>

                        <div class="form-group {{$errors->has('city')? 'has-error':''}}">
                            <label for="city" class="text-muted font-weight-bold">City</label>
                            <input type="text" class="form-control" name="city" value="{{ucfirst($value->city)}}" id="city" placeholder="City">
                            <span class="text-danger">{{$errors->first('city')}}
                            </span>
                        </div>

                        <div class="form-group {{$errors->has('state')? 'has-error':''}}">
                            <label for="state" class="text-muted font-weight-bold">State</label>
                            <input type="text" class="form-control" name="state" value="{{ucfirst($value->state)}}" id="state" placeholder="City">
                            <span class="text-danger">{{$errors->first('state')}}
                            </span>
                        </div>

                        <div class="form-group {{$errors->has('country')? 'has-error':''}}">
                            <label for="country" class="text-muted font-weight-bold">Country</label>
                            <input type="text" class="form-control" name="country" value="{{ucfirst($value->country)}}" id="country" placeholder="Country">
                            <span class="text-danger">{{$errors->first('country')}}
                            </span>
                        </div>
                        
                        <div class="form-group {{$errors->has('pincode')? 'has-error':''}}">
                            <label for="pincode" class="text-muted font-weight-bold">Pincode</label>
                            <input type="text" class="form-control" name="pincode" value="{{$value->pincode}}" id="pincode" placeholder="Pincode">
                            <span class="text-danger">{{$errors->first('pincode')}}
                            </span>
                        </div>
                      
                       @endforeach 
                      <button type="submit" class="btn btn-primary">Update Address</button>
                  </form>
                      
              </div>
              
               
        </div>
      </div>
  </div>
</section>
@endsection 