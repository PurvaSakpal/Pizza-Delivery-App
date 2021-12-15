<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="{{URL::asset('image/pizza2.jpg')}}" class="navbar-brand" alt="Pizza_logo" width="70" height="70">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   </div>
   <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span></a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('order')}}">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">Profile</a>
      </li>
    </ul>
    <div class="div-inline my-2 my-lg-0">
        <a href="{{route('logout')}}" class="btn btn-outline-dark my-2 my-sm-0 float-right" role="button">Logout</a>
      </div>
</nav>