@extends('front.master')
@section('title','Checkout Page')
@section('content')
<h1 class="text-warning">
  {{Cart::tax()}} total tax
</h1>

<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <br>
                <h2 class="text-warning">Checkout</h2>
                <p class="lead text-muted">
                  You currently have {{Cart::count()}} item(s) in your basket
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Checout Forms-->

<div class="table-responsive cart_info">
<table class="table table-condensed border-bottom">
    <thead>
        <tr>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
        </tr>
        <tr class="cart_menu badge-info">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
      <?php $count =1;?>
      @foreach($cartItems as $cartItem)
        <tr>
            <td class="cart_product">
                <a href="{{route('productDetail',$cartItem->id)}}">
                   <img src="{{url('image',$cartItem->options->img)}}" alt="" width="200px">
                </a>
            </td>
            <td class="cart_description">
                <h4>
                   <a href="{{route('productDetail',$cartItem->id)}}" class="text-warning">{{$cartItem->name}}</a>
                </h4>
                <p class="text-secondary">
                   Product ID: {{$cartItem->id}}
                </p>
                <p class="text-secondary">
                   Only {{$cartItem->options->stock}} left
                </p>
            </td>

            <td class="cart_price">
                <p class="text-success">$ {{$cartItem->price}}</p>
            </td>
            <td class="cart_quantity">
                <form action="{{url('cart/update',$cartItem->rowId)}}" method="post">
                    {{ method_field('PUT') }}   
                    {{ csrf_field() }}
                    <input type="hidden" name="proId" value="{{$cartItem->id}}"/>

                    <div class="cart_quantity_button">

                        <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                        <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                        <input type="number" size="2" 
                          value="{{$cartItem->qty}}" 
                          name="qty" id="upCart<?php echo $count;?>" autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30" />
                        <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px" />
                    </div>
                </form>
            </td>

            <td class="cart_total">
                <p class="cart_total_price text-success">
                   ${{$cartItem->subtotal}}
                </p>
            </td>

            <td class="cart_delete">
                <button class="btn btn-danger">
                    <a class="cart_quantity_delete text-light"  
                    href="{{route('cart.remove',$cartItem->rowId)}}">
                        <i class="fa fa-times"></i>
                    </a>
                </button>
            </td>
        </tr>
        <?php $count++;?>
      </tbody>
    @endforeach
</table>
</div>

<?php  // form start here ?>
<section class="checkout">
<br><br>
  <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="tab-content">
                <div id="address" class="active tab-block">
                    <form action="{{url('admin/formvalidate')}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        <h1 class="text-warning">Shipping Address</h1>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fullname" class="form-label">Display Name</label>
                                <input id="fullname" type="text" name="fullname" placeholder="Display Name"  
                                      value="{{ old('firstname') }}" class="form-control">
                                <br>
                                <span style="color:red">
                                    {{ $errors->first('fullname') }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="state" class="form-label">State Name</label>
                                <input id="state" type="text" name="state" placeholder="State Name" value="{{ old('state') }}" class="form-control">
                                <br>
                                <span style="color:red">
                                    {{ $errors->first('state') }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input id="pincode" type="text" name="pincode" placeholder="Pincode" value="{{ old('pincode') }}" class="form-control">
                                <br>
                                <span style="color:red">{{ $errors->first('pincode') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city" class="form-label">City Name</label>
                                <input id="city" type="text" name="city" 
                                  placeholder="City Name" value="{{ old('city') }}" class="form-control">
                                <br>
                                <span style="color:red">{{ $errors->first('city') }}</span>
                            </div>
                            <hr>
                            <div class="form-group col-md-12">
                                    <select name="country" class="form-control">
                                        <option value="{{ old('country') }}" selected="selected">
                                            Select country
                                        </option>
                                        <option value="United States">United States</option>
                                        <option value="Bangladesh"> Bangladesh</option>
                                        <option value="UK">UK</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Ucrane">Ucrane</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Dubai">Dubai</option>
                                    </select>
                                    <span style="color:red">
                                        {{ $errors->first('country') }}
                                    </span>
                            </div>
                            <span><input type="radio" name="payment_type" value="COD" checked="checked"> COD</span>
                            <span> &nbsp;<input type="radio" name="payment_type" value="paypal">PayPal</span>
                            <div class="row" style="height: 24px; margin-left: 15px;">
                                @include('front.paypal')&nbsp;&nbsp;
                                <input type="submit" value="Continue" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-sm-5">
                <div class="block-body order-summary">
                    <h6 class="text-uppercase">Order Summary</h6>
                    <p>Shipping and additional costs are calculated based on values you have entered</p>

                    <ul class="order-menu list-unstyled">
                        <li class="d-flex justify-content-between">
                            <span> Order Subtotal</span>
                            <strong>${{Cart::subtotal()}}</strong>
                        </li>

                        <li class="d-flex justify-content-between">
                            <span>Shipping and handling</span>
                            <strong>Free</strong>
                        </li>

                        <li class="d-flex justify-content-between"><span>Tax</span>
                            <strong>
                              ${{Cart::tax()}}
                            </strong>
                        </li>
                        <li class="d-flex justify-content-between">
                          <span>Total</span>
                          <strong class="text-primary price-total">
                            ${{Cart::total()}}
                          </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  // form start here ?>
@endsection