<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        @can('Products')
        <li class="nav-item">
          <a class="nav-link" href="{{route('products')}}">Products</a>
        </li>
        @endcan

        @can('Checkout')
        <li class="nav-item">
          <a class="nav-link" href="{{route('checkout')}}">Checkout</a>
        </li>
        @endcan

        <li class="nav-item">
          <a class="nav-link" href="{{route('users.index')}}">Users</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="{{route('logout')}}">Logout</a>
      </span>
    </div>
  </div>
</nav>