@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<section id="profile-section">
  <div class="container text-center" id="profile-container" >
    <div class="row row-centered">
      <div class="col-sm-5 panel panel-default col-centered " id="profile-panel">
        <div class="panel-header center-block">
          @include('includes.restaurant-profilecontentbar')
        </div>
  <div class="panel-body">
    <form id="restaurant-signup-form" action="" accept-charset="utf-8" method="POST" role="form" >
        <div class="input-row row" >
          <input type="text" name="companyname" id="companyname" class="input-fieldformat form-control"  placeholder="Company Name" />
        </div>
        <div class="input-row row" >
          <input type="text" name="streetaddress" id="streetaddress"  class="input-fieldformat form-control" placeholder="Street Address"/>
        </div>
        <div class="input-row row" >
          <input type="text" name="province" id="province" class="input-fieldformat form-control" placeholder="State/Province"/>
        </div>
        <div class="input-row row" >
          <input type="text" name="country" id="country"  class="input-fieldformat form-control" placeholder="Country"/>
        </div>
        <div class="input-row row" >
          <input type="text" name="city" id="city"  class="input-fieldformat form-control" placeholder="City"/>
        </div>
        <div class="input-row row" >
          <input type="text" name="zipcode" id="zipcode"  class="input-fieldformat form-control" placeholder="Postal/ZipCode"/>
        </div>
        <div class="input-row row" >
                <input type="tel" name="phoneno" id="phoneno" class="input-fieldformat form-control"  placeholder="Phone Number"/>
        </div>
        <div class="input-row row" >
                <input type="email" name="email" id="email" class="input-fieldformat form-control"  placeholder="Email Address"/>
        </div>
        </div><!-- panel body container -->
    </form>
      </div>
  </div>
  </div><!-- container --->
</div>
</div>
</section>
@endsection


@section('javascript')
<script>
$(function() {
$("#rpcontent-settings").addClass("active");
});
</script>
@endsection
