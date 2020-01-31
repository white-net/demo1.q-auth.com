@inject('UserCtl','App\Http\Controllers\UserController')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">{{ __('display.Title') }}</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="nav navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i>{{ __('display.Account') }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if($UserCtl->chkAuth())
            <a class="dropdown-item" href="{{url('/').'/user/editProfile'}}"><i class="fas fa-user-edit" aria-hidden="true"></i> {{ __('display.Account Modify') }}</a>
            <a class="dropdown-item" href="{{url('/').'/user/changeDev'}}"><i class="fas fa-exchange-alt" aria-hidden="true"></i> {{ __('display.Change') }}</a>
            @else
            <a class="dropdown-item" href="{{route('user.regUser')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ __('display.Sign Up') }}</a>
            <a class="dropdown-item" href="{{ url('/').'/user/stopauthmail'}}"><i class="fas fa-user-slash" aria-hidden="true"></i> {{ __('display.Stop') }}</a>
            <a class="dropdown-item" href="{{ url('/').'/user/restartauthmail'}}"><i class="far fa-user" aria-hidden="true"></i> {{ __('display.Restart') }}</a>
            @endif
          </div>
        </li>
        @if($UserCtl->chkAuth())
        <li class="nav-item"><a class="nav-link" href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('display.Log Out') }}</a></li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{route('user.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('display.Log In') }}</a></li>
        @endif
      </ul>
    </div>

  </div>
</nav>