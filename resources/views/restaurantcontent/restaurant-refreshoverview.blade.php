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
                    <td>{{$currentorder->order_id}}</td>
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
                    <td data-toggle="collapse" data-target="#orderdropdown{{$id}}" data-value="{{$id}}">
                      <div data-toggle="tooltip" title="Click to show Items of Order"  >
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
