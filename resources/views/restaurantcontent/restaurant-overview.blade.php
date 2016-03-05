@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar-logged')
@endsection


@section('content')
@include('includes.restaurant-nav')
<section id="restaurantoverview-section">
  <div id="restaurant-overview-container" class="container">
    <div class="row ">
      <div class="col-sm-12 text-center">

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
          <h1>Orders
          <span class="badge">10</span>
        </h1>
         </div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                      <div class="table-responsive"><!-- Start table container -->
                        <table class="table table-condensed table-hover table-bordered">
                          <thead>
                            <tr>
                              <th>Time</th>
                              <th>Order Info</th>
                              <th>Pickup or Delivery</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td>Chicken</td>
                              <td>
                                <p>Mr. Jim Smith</p>
                                <p>James Street</p>
                                <p>St. Catharines ON</p>
                                <p>905-378-5843</p>
                              </td>

                                    <td  data-toggle="collapse" data-target="#orderdropdown">
                                    <div data-toggle="tooltip" title="Click to show Items of Order"  >
                                        Delivery
                                      </div>
                                    </td>

                            </tr>

                            <tr>
                              <td>Chicken</td>
                              <td>
                                <p>Mr. Jim Smith</p>
                                <p>James Street</p>
                                <p>St. Catharines ON</p>
                                <p>905-378-5843</p>
                              </td>
                              <td  data-toggle="collapse" data-target="#orderdropdown">
                                  <div data-toggle="tooltip" title="Click to show Items of Order"  >
                                  Delivery
                                  </div>
                              </td>
                            </tr>

                            <tr>
                              <td>Chicken</td>
                              <td>
                                <p>Mr. Jim Smith</p>
                                <p>James Street</p>
                                <p>St. Catharines ON</p>
                                <p>905-378-5843</p>
                              </td>
                              <td  data-toggle="collapse" data-target="#orderdropdown">
                                  <div data-toggle="tooltip" title="Click to show Items of Order"  >
                                  Delivery
                                  </div>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div><!-- End table container -->

                    </div> <!--main column -->
                </div><!-- row -->
              </div> <!-- panel body -->
      </div><!-- panel -->
    </div><!--main column end -->
  </div>
  </div>
</section>
@include('includes.orderdropdown')

@endsection

@section('javascript')
<script>
$(function() {
  $("#restaurantnavlink-orders").addClass("active");
  $('[data-toggle="tooltip"]').tooltip();

});
</script>
@endsection
