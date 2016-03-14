<!-- php include head for debugging -->
<div id="topbar-logged" class="topbar">
  <nav class="navbar  topbar-loggednav navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('restaurantoverviewlink'  ) }}">
          <span class="glyphicon glyphicon-road"></span> J3 Delivery
        </a>
      </div>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span>
            <span class="glyphicon glyphicon-menu-down"></span>
            <ul class="dropdown-menu">
              <li><a href="#">Welcome</a></li>
              <li><a href="{{ route('restaurantoverviewlink'  ) }}">Overview</a></li>
              <li><a href="{{ route('restaurantprofilelink'  ) }}">Edit Profile</a></li>
              <li class="separator"> </li>
              <li><a href="{{ route('homelink'  ) }}">Logout</a></li>
            </ul>
          </li>
        </ul>
    </div>
  </nav>
</div>
