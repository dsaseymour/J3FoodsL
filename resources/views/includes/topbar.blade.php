<!-- php include head for debugging -->
<div id="topbar" class="topbar">
  <nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('homelink'  ) }}">
          <span class="glyphicon glyphicon-road"></span> J3 Delivery
        </a>
      </div>
          <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form " role="navigation">
            <div class="form-group">
             @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
              <!--<input type="text" class="form-control" placeholder="Username">
              <input type="text" class="form-control" placeholder="Password">-->
            </div>
            <!--<button type="submit" class="btn btn-default">Login</button>-->
          </form>
        </ul>
    </div><!-- row -->
  </nav>
  </div>
