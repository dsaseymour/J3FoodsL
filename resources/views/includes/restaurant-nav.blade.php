<div id="restaurant-navbar " class="container topbar" >
  <div class="row">
  <ul class="nav nav-pills">
    <!-- would need to use javascript to update the active tab when clicked? -->
    <li class="nav-item" id="restaurantnavlink-orders">
      <a class="nav-link" href="{{ route('restaurantoverviewlink'  ) }}">Orders <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item" id="restaurantnavlink-menu">
      <a class="nav-link" href="{{ route('restaurantmoverviewlink'  ) }}">Menu</a>
    </li>
    <li class="nav-item" id="restaurantnavlink-history">
      <a class="nav-link" href="{{ route('restauranthistorylink'  ) }}">History</a>
    </li>
  </ul>
</div>
</div>
