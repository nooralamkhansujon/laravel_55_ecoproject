<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.index')}}">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.create')}}">
                  <span data-feather="file"></span>
                   Add Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.product.index')}}">
                  <span data-feather="shopping-cart"></span>
                  List Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                  <span data-feather="users"></span>
                  Categories
                </a>
              </li>
  
            </ul>
          </div>
        </nav>

