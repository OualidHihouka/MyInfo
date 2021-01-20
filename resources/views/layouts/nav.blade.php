
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">MyInfo </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('userscv.store')}}">UsersCv</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
        </li>

         
      </ul>

      <ul class="navbar-nav navbar-right ">
        @if (!(Auth::user()))
            <li class="nav-item">
                <a class="nav-link" href="{{route('login.index')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register.index')}}">Register</a>
            </li>

        @else

            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu  dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('profile.show',['id'=>Auth::user()->id])}}">Profile</a>
                    <a class="dropdown-item" href="{{route('editeprofile.show',['id'=>Auth::user()->id])}}">Edite Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('login.logout')}}">Deconnection</a>
                </div>
            </li>
          @endif
        </ul> 
    </div>
  </nav>