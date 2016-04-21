@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
@endsection

@section('styles')
  <style>
    .show-details {
      color: blue;
      cursor: pointer;
      text-decoration: underline;
    }



  </style>
@endsection

@section('content')

@include('includes.restaurant-nav')

<section id="restaurantoverview-section">
  <div id="restaurant-overview-container" class="container">
    <div class="row ">
      @if(session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

      <div class="col-sm-12 text-center">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
          @if ($user->confirmed == 0)
            <p> <b>Please confirm your email so that customer can place orders to your restaurant.</b></p>
          @endif
            <h1>{{$restaurant->companyname}} Orders
              <span class="badge">{{count($uniqueorders)}}</span>
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
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($uniqueorders as $currentorder)
                      <tr>
                        <td>{{date('D, M j Y H:i:s', strtotime($currentorder->submit_time))}}</td>
                        <td><span class="order-id">{{$currentorder->order_id}}</span> </br> <span class="show-details">Click for order details</span></td>
                        <td>
                          <p>{{$currentorder->user->name}}</p>
                          @if($currentorder->user->address)
                            {{-- */$Address=explode(',',$currentorder->user->address);/* --}}
                            @foreach($Address as $addresspart)
                              <p>{{$addresspart}}</p>
                            @endforeach
                          @else
                            <p>No Address Provided</p>
                          @endif
                          <p>{{$currentorder->customer->phoneno}}</p>
                        </td>
                        {{-- */$id = $currentorder->order_id;/* --}}
                        <td>
                          <div>
                            @if($currentorder->pickup_delivery=='1')
                            Delivery
                            @else
                            Pick-up
                            @endif
                          </div>
                        </td>
                        <td>
                          <a class="btn btn-success" href="{{ route('finishorder' , $id ) }}">
                          <span class="glyphicon glyphicon-ok"></span> Order Completed</a>
                          <a class="btn btn-danger" href="{{ route('cancelorder' , $id  ) }}">
                          <span class="glyphicon glyphicon-remove"></span> Cancel Order</a>
                        </td>
                      </tr>
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

  <!-- Modal -->
  <div id="order-details-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Order details</h4>
        </div>
        <div id="details-body" class="modal-body">
            
        </div>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
<script>
  $(document).ready(function() {
    $("#restaurantnavlink-orders").addClass("active");
    $('[data-toggle="tooltip"]').tooltip();

    setTimeout(function(){
      $("#restaurantoverview-section").submit(function(){
        $.ajax({
          url: "{{ route('restaurantoverviewlink') }}",
          type: "get",
          data: {}
        });
      });
    },300);

    //Open details window when clicking on an order
      $("#restaurant-overview-container").on("click", ".show-details", function(e){
        orderid = $(e.target).parent().find(".order-id").text();
        console.log(orderid);
        $.get("{{route("showdetails", ["order"=>""])}}/"+orderid, function(response){
          if(response != null){
            console.log($("#restaurant-overview-container .modal-body"));
            $("#details-body").html(response);
          }
          $("#order-details-modal").modal("show");
        });
      });

    setInterval(pageRefreshCall, 10000);
    function pageRefreshCall() {
        $.ajax({
           url: "{{ route('restaurantoverviewlink') }}",
           cache: false,
           type: 'GET',
           success: function(response){
        if(response){
            $('#restaurant-overview-container').html(response);
            }
           }
        });
    }
  });
</script>
@endsection