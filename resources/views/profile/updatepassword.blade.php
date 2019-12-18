@extends('front.master')
@section('title','Password Page')

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
                 {{ucwords(Auth::user()->name)}}</span>, Update Your Password 
               </h3>
               <hr>
              <div class="container">
              @if(session()->has('msg'))
                  <div class="alert alert-danger">
                    {{ session()->get('msg') }}
                  </div>
              @endif 
              <form action="{{route('updatePassword')}}" method="POST" role="form">
                     {{csrf_field()}}
                     {{ method_field('PUT') }}

                    <div class="form-group {{$errors->has('oldPassword')? 'has-error':''}}">
                        <label class="text-muted font-weight-bold" for="oldPassword">
                            Current Password
                        </label>
                        <input type="password" class="form-control" name="oldPassword"  id="oldPassword" placeholder="Old Password">
                        <span class="text-danger">{{$errors->first('oldPassword')}}
                        </span>
                    </div>

                    <div class="form-group {{$errors->has('newPassword')? 'has-error':''}}">
                        <label for="newPassword" class="text-muted font-weight-bold">New Password</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                        <span class="text-danger">{{$errors->first('newPassword')}}
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                  </form>
                      
              </div>
              
               
        </div>
      </div>
  </div>
</section>
@endsection 