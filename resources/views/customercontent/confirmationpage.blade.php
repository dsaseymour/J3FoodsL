@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')

<div class="container">
<div class="row">
<div class="col-sm-12">
  @if($order->first())
  <h1>Confirmation Page</h1>
  <div class="list-group">
    <div class="list-group-item ">
      <h4 class="list-group-item-heading">Order Information</h4>
      <div class="table-responsive"><!-- Start table container -->
        <table class="table table-condensed table-bordered">
          <tbody>
            <tr>
              <td>Quantity</td>
              <td>Menu Item</td>
              <td>Options</td>
              <td>Price</td>
              <td>Remove</td>
            </tr>
            {{-- */$totalprice=0;/* --}}
            {{-- */$orderid = $order[0]->order_id;/* --}}
            @foreach($order as $currentitem)
              {{-- */$optionselection = '';/* --}}
              @if($currentitem->option_id)
                {{-- */$option = $currentitem->item->option->name;/* --}}
                @if($currentitem->choice)
                  {{-- */$choices=explode(',',$currentitem->choice);/* --}}
                  @foreach($choices as $choice)
                    @if($currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first())
                      @if(empty($optionselection))
                        {{-- */$optionselection = $currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first()->name;/* --}}
                      @else
                        {{-- */$optionselection = $optionselection.", ".$currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first()->name;/* --}}
                      @endif
                    @else
                      @if(empty($optionselection))
                        {{-- */$optionselection = $choice;/* --}}
                      @else
                        {{-- */$optionselection = $optionselection.", ".$choice;/* --}}
                      @endif
                    @endif
                  @endforeach
                @else
                  {{-- */$optionselection = 'No Selection';/* --}}
                @endif
              @else
                {{-- */$option = 'No Additional Options';/* --}}
                {{-- */$optionselection = 'No Selection';/* --}}
              @endif
            {{-- */$totalprice = $totalprice + (($currentitem->quantity)*($currentitem->item->price));/* --}}
            <tr>
              <td>{{$currentitem->quantity}}</td>
              <td>{{$currentitem->item->name}}</td>
              <td>{{$option.": ".$optionselection}}</td>
              <td>${{$currentitem->item->price}}</td>
              <td><a class="btn btn-danger" href="{{route('removeitemlink', $currentitem->item_id)}}">
                <span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- End table container -->
    </div>



    <div class="list-group-item ">
      <h4 class="list-group-item-heading">Price </h4>
      <div class="table-responsive"><!-- Start table container -->
        <table class="table table-condensed table-bordered">
          <tbody>
            <tr>
              <td>Subtotal</td>
              <td>${{$totalprice}}</td>
            </tr>

            <tr>
              <td>Tax</td>
              <td>${{number_format($totalprice*0.13,2)}}</td>
            </tr>

            <tr>
              <td>Total Purchases</td>
              <td>${{number_format($totalprice*1.13,2)}}</td>
            </tr>

            <tr>
              <td>Minimum Order Fee</td>
              <td>$7</td>
            </tr>

            <tr>
              <td>Delivery or Pickup</td>
              @if($order[0]->pickup_delivery=='1')
              <td>Delivery</td>
              @else
              <td>Pick-up</td>
              @endif
            </tr>
          </tbody>
        </table>
      </div><!-- End table container -->
    </div>
    <div  class="list-group-item text-right" id="confirm-page-btn">
    @if($totalprice>($order[0]->restaurant->max_order_price))
    <div method="PUT" class="btn btn-default btn-lg" data-toggle="modal" data-target="#" disabled>
    <div data-toggle="tooltip" title="Your order total is above the Restaurants' limit"  >
    @elseif((($order[0]->customer->is_guest)==1) && (($order[0]->restaurant->allow_guests)==0))
    <div method="PUT" class="btn btn-default btn-lg" data-toggle="modal" data-target="#" disabled>
    <div data-toggle="tooltip" title="The Restaurant does not allow guest orders"  >
    @else
    <div method="PUT" class="btn btn-default btn-lg">
    @endif
    Order
    <input type="hidden" value="{{Session::token()}}" name="_token" /></div>
    </div>
  </div>
  @else
  <h1>Confirmation Page</h1>
    <div class="list-group">
      <div class="list-group-item ">
        <h4>You have no items in your cart</h4>
      </div>
    </div>
  {{-- */$orderid = '0';/* --}}
  @endif
</div>
</div>
</div> <!-- container-->


<!-- Modal -->
<div id="confirmation-result" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Order Successfully Processed</p>
      </div>
      <div class="modal-footer">
        <a href="{{ route('orderconfirmlink', $orderid ) }}"><button type="button" class="btn btn-default" >View Order Reciept</button></a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $(".btn-lg").click(function() {
      $request = $.post({
        url: "{{ route('submitorderlink') }}",
        type: "get",
        data: {},
        error: function(xhr, status) {            
          if(xhr.status=='401'){
            window.location.href = "{{ route('notconfirmed') }}"
          }
        },
        success: function(xhr, status){
          $("#confirmation-result").modal('show');
        } 
      });
      });
    });
</script>
@endsection
