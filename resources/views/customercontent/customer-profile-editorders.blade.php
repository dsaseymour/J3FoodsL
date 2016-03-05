@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<section id="profile-section">
  <div class="container text-center" id="profile-container" >
    <div class="row row-centered">
      <div class="col-sm-5 panel panel-default col-centered " id="profile-panel">
        <div class="panel-header center-block">
      <?php    require("../../php/customercontent/customer-profile-contentbar.php"); ?>
        </div>


  <div class="panel-body">
      <form action="/" method="POST" role="form">
          <div class="form-group">

              <div class="input-row row">
              <label class="sr-only" for="email">Email:</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email"/>
                  </div>

              <div class="input-row row">
              <label class="sr-only" for="firstname">Firstname:</label>
              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"/>
              </div>

              <div class="input-row row">
              <label class="sr-only" for="lastname">Last Name:</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"/>
                  </div>

                  <div class="input-row row">
                  <label class="sr-only" for="phonenumber">Phone Number:</label>
                  <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Phone Number"/>
                      </div>



              <div class="input-row row">
                  <div class="btn btn-default" data-toggle="collapse" data-target="#changepassword">Change Password?</div>
                  <div id="changepassword" class="collapse input-row">
                      <div class="row">
                          <div class="col-sm-4">
                              <label class="sr-only" for="password">Password:</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                          </div>

                          <div class="col-sm-4">
                              <label class="sr-only" for="password">Password:</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                          </div>

                      </div>
                  </div>
              </div>


          </div>


      <div class="login-btn btn btn-lg btn-primary  center-block btn-block" />Save Changes</div>

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

      $("#cpcontent-history").addClass("active");



});
</script>
@endsection
