<!-- <nav class="navbar bg-success navbar-default">

    <div class="container-fluid">
     
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>
  
     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

-->


<ul id="dropdown1" class="dropdown-content">
    @if (Auth::guest() )
      <li><a href="/register">Sign up</a></li>
      <li><a href="/login">Login</a></li>
    @else
      @if(Auth::check())
        <li class="divider"></li>
        <li><a href="{{route('user.profile', [Auth::user()->id])}}">Profile</a></li>
        <li><a href="/logout">Logout</a></li>
      @endif
  
    @endif
      @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="divider"></li>
        <li><a href="/admin">Admin panel</a></li>
     
      @endif
  
</ul>

<ul id="dropdown2" class="dropdown-content">
    @if (Auth::guest() )
      <li><a href="/register">Sign up</a></li>
      <li><a href="/login">Login</a></li>
    @else
      @if(Auth::check())
        <li class="divider"></li>
        <li><a href="{{route('user.profile', [Auth::user()->id])}}">Profile</a></li>
        <li><a href="/logout">Logout</a></li>
      @endif
  
    @endif
      @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="divider"></li>
        <li><a href="/admin">Admin panel</a></li>
     
      @endif
  
</ul>
  
  <nav class="nav-div red-text text-lighten-2 z-depth-1">
      <div class="nav-wrapper white z-depth-1">
        <a href="/" class="brand-logo logo-link">
        <span style="height: 100px; color: #e57373; line-height:0px;">
          <img style="border-radius: 100px;" src="{!! asset('wallpaper/logo.png') !!}" class="circle" alt="logo" width="50px" height="50px"> <span class="logo-text"> Oriental Services </span>  </span> 
          
         </a>

        <a href="#" data-activates="mobile-demo" class="button-collapse red-text text-lighten-2"><i class="fas fa-align-justify"></i></a>
        <ul class="right hide-on-med-and-down red-text text-lighten-2 tel-nav ">
          
          <li><a class="red-text text-lighten-2" href="#">About Us</a></li>
          <li><a class="red-text text-lighten-2" href="#">Contact Us</a></li>
          <li><a class="red-text text-lighten-2" href="/jobs">Jobs</a></li>
    
          <li class="login"><a href="/login" class="login_btn center-align">Login</a> </li>
          <li class="sign_up"><a href="/register" class="sign_in">Sign Up</a></li>
        
            <li><a class="dropdown-button red-text text-lighten-2" href="#!" data-activates="dropdown1">Options</a></li>
          
        </ul>
      </div>
  </nav>
  <div>
    <ul class="side-nav side-view" id="mobile-demo">
      <li><a href="/jobs">Jobs</a></li>
      <li><a href="">Contact</a></li>
      <li><a href="">About Us</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Options+
      </a></li>
    </ul>
  </div>