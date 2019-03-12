<ul id="dropdown1" class="dropdown-content">
  @if (!Auth::check())
  <li><a href="/register">Register</a></li>
  <li><a href="/login">Login</a></li>
  @else
  @if(Auth::user()->hasRole('manager'))
    <li><a href="/admin"> Admin Page</a></li>
  @endif
  <li class="divider"></li>
  <li><a href="/logout">Logout</a></li>
  @endif
</ul>

<nav>
    <div class="nav-wrapper light-blue accent-3">
      <a href="#!" class="brand-logo">Cipher</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/contact">Create</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Register +</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
      <li><a href="/">Home</a></li>
      <li><a href="/blog">Blog</a></li>
        <li><a href="/tickets.index">About</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/admin/users">Users</a></li>
      </ul>
    </div>
  </nav>