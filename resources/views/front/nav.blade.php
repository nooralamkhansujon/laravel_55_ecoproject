<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#0c5460;">
  <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png')}}" width="120px" height="90px" style="border-radius:50%;" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  @php  $value =  count(explode('/', url()->current()))  @endphp
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link {{ explode('/',url()->current())[$value-1]  == 'home' ?'active':''}}" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ explode('/',url()->current())[$value-1]  == 'shop' ?'active':''}}" href="{{route('shop')}}">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         @foreach($categories as $category)
             <a class="dropdown-item" href="{{url('category',$category->id)}}">
               {{$category->name}}
             </a>
          @endforeach
        </div>
      </li>
      <li>
        <a href="{{url('contact')}}" class="nav-link {{ explode('/',url()->current())[$value-1]  == 'contact' ?'active':''}}" >Contact</a>
      </li>
      <li class="nav-item">
          <a href="{{ url('wishList')}}" class="nav-link {{ explode('/',url()->current())[$value-1]  == 'wishlist' ?'active':''}}">
             <i class="fa fa-star"></i>
              WishList
              <span style="color:green;font-weight:bold;">
                {{App\WishList::count()}}
              </span>
          </a>
      </li>

       @if(Auth::check())
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>

             <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">
                   {{Auth::user()->name}}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a>
                 <!-- form for logout -->
                 <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                   {{ csrf_field() }}
                 </form>
                <a class="dropdown-item" href="{{route('profile')}}">
                    Profile
                </a>
             </div>
          </li>
         
       @else 
          <li class="nav-item">
            <a class="nav-link {{ explode('/',url()->current())[$value-1]  == 'login' ?'active':''}}" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
             <a href="{{url('register')}}" class="nav-link {{ explode('/',url()->current())[$value-1]  == 'register' ?'active':''}}" >Register</a>
         </li>
       @endif
       <li class="nav-item" style="list-style:none;">
            <a class="nav-link" href="{{route('cart.index')}}">
              &nbsp;Cart&nbsp; ({{ Cart::count() }} items ) &nbsp;({{Cart::total()}} $)
            </a>
        </li>
    </ul>
  </div>
</nav>
