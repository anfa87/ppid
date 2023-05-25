<div class="navbar-header">
    <a class="navbar-brand" href="/dashboard">PPID</a>
</div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>


<ul class="nav navbar-nav navbar-left navbar-top-links">
    <li>
      <a href="/"> Ke Website</a>
    </li>
  </ul>
<!-- Top Navigation: Left Menu -->
<ul class="nav navbar-nav navbar-left navbar-brand">
    <li></li>
</ul>

<!-- Top Navigation: Right Menu -->
<form action="/logout" method="post">
    @csrf
<ul class="nav navbar-right navbar-top-links">
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
                
                <a href="#"><button type="submit" class="btn-logout"><i class="fa fa-sign-out fa-fw"></i> Logout</button></a>
            </li>
        </ul>
    </li>
</ul>
</form>
