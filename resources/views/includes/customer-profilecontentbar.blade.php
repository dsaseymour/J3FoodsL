<div id="cp-contentbar " class="topbar " >
  <div class="row">
  <ul class="nav nav-pills nav-justified">
    <!-- would need to use javascript to update the active tab when clicked? -->
    <li class="nav-item" id="cpcontent-profile">
      <a class="nav-link" href="{{ route('customerprofilelink'  ) }}">Profile </a>
    </li>
    <li class="nav-item" id="cpcontent-addresses">
      <a class="nav-link" href="{{ route('cpeditaddresslink'  ) }}">Addresses</a>
    </li>
    <li class="nav-item" id="cpcontent-history">
      <a class="nav-link" href="{{ route('showcpeditorderslink'  ) }}">Order History</a>
    </li>
  </ul>
</div>
</div>
