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
        <form action="/" method="POST" role="form">

        <div class="panel-header center-block">
          @include('includes.restaurant-profilecontentbar')
        </div>

        <div class="panel-body">

        <div class="table-responsive"><!-- Start table container -->
          <table class="table table-condensed table-hover table-bordered">
            <thead>
              <h3>Order Restrictions</h3>
            </thead>
            <tbody>

              <tr>
                <td>General Order Limit</td>
                <td><input type="number" class="form-control"  /></td>
              </tr>

              <tr>
                <td>General Order Limit</td>
                <td><input type="number" class="form-control"  /></td>
              </tr>

              <tr>
                <td>General Order Limit</td>
                <td><input type="text" class="form-control"  /></td>
              </tr>

            </tbody>
          </table>
        </div><!-- End table container -->


    <div class="table-responsive"><!-- Start table container -->
    <table class="table table-condensed table-hover table-bordered">
      <thead>
    <h3>Guest Restrictions</h3>
  </thead>
  <tbody>

    <tr>
      <td>Chicken</td>
      <td><input type="text" class="form-control" /></td>
    </tr>

    <tr>
      <td>Pizza</td>
      <td><input type="text" class="form-control" /></td>
    </tr>

    <tr>
      <td>Rice</td>
      <td><input type="text" class="form-control" /></td>
    </tr>

  </tbody>
</table>
</div><!-- End table container -->

<div class="input-row row text-right" >
  <button type='submit'  class="btn  btn-primary   " />Save Changes</button>
</div>
</div>


<input type="hidden" value="{{Session::token()}}" name="_token" />
</form>
  </div>
  </div><!-- container --->
</div>
</div>
</section>
@endsection


@section('javascript')
<script>
$(function() {

$("#rpcontent-restrications").addClass("active");



});
</script>
@endsection
