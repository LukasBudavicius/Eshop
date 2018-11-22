<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="{{action('ProductsController@index')}}">Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          <a class="nav-link" href="{{action('ProductsController@index')}}"><i class="fas fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(Auth::check())
          <li class="nav-item disabled">
            <a class="nav-link" href="{{action('UserController@getProfile')}}"><i class="fas fa-user-circle"></i> User profile</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link" href="{{Auth::logout()}}"><i class="fas fa-user-circle"></i> Logout</a>
          </li>
          @else
          <li class="nav-item disabled">
            <a class="nav-link" href="{{action('UserController@getSignup')}}"><i class="fas fa-user-circle"></i> Register</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link" href="{{action('UserController@getSignIn')}}"><i class="fas fa-user-alt"></i> Login</a>
          </li>
          @endif
          @if(session('cart'))
          <li class="nav-item disabled">
            <a class="nav-link" href="{{action('ProductsController@cart')}}"><i class="fas fa-shopping-cart"></i> Cart</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
