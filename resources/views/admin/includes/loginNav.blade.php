<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="{{URL::asset('image/pizza2.jpg')}}" class="navbar-brand" alt="Pizza_logo" width="70" height="70">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  </div>
      <div class="div-inline my-2 my-lg-0">
        <a href="{{route('signup')}}" class="btn btn-outline-dark my-2 my-sm-0 mr-2" role="button">SignUp</a>
        <a href="{{route('login')}}" class="btn btn-outline-dark my-2 my-sm-0 float-right" role="button">Login</a>
      </div>
</nav>