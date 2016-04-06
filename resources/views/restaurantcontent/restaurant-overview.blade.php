@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
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
            <h1>{{$restaurant->companyname}} Orders
              <span class="badge">10</span>
              @if ($restaurant->is_open == 1)
              <a class="btn btn-primary" href="{{ route('closerestaurant' , ['restaurant' => $restaurant->id] ) }}"> 
                <span class="glyphicon glyphicon-remove"></span> CLOSE
              </a> 
              @else
              <a class="btn btn-primary" href="{{ route('closerestaurant' , ['restaurant' => $restaurant->id] ) }}"> 
                <span class="glyphicon glyphicon-plus"></span> OPEN
              </a> 
              @endif
            </h1>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12 text-center">
                <div class="table-responsive"><!-- Start table container -->
                  @if($uniqueorders->first())
                  <table class="table table-condensed table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Order Number</th>
                        <th>Order Info</th>
                        <th>Pickup or Delivery</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($uniqueorders as $currentorder)
                      <tr>
                        <td>{{date('D, M j Y H:i:s', strtotime($currentorder->submit_time))}}</td>
                        <td>{{$currentorder->order_id}}</td>
                        <td>
                          <p>{{$currentorder->user->name}}</p>
                          <p>{{$currentorder->user->address}}</p>
                          <p>St. Catharines ON</p>
                          <p>{{$currentorder->customer->phoneno}}</p>
                        </td>
                        {{-- */$id = $currentorder->order_id;/* --}}
                        <td data-toggle="collapse" data-target="#orderdropdown{{$id}}" data-value="{{$id}}">
                          <div data-toggle="tooltip" title="Click to show Items of Order"  >
                            Delivery
                          </div>
                        </td>
                      </tr>
                      @include('includes.orderdropdown')
                      @endforeach()
                    </tbody>
                  </table>
                  @else
                  <h4>You currently have no pending orders</h4>
                  @endif
                </div><!-- End table container -->

              </div> <!--main column -->
            </div><!-- row -->
          </div> <!-- panel body -->
        </div><!-- panel -->
      </div><!--main column end -->
    </div>
  </div>
</section>

@endsection

@section('javascript')
<script>
  $(document).ready(function() {
    $("#restaurantnavlink-orders").addClass("active");
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
@endsection
