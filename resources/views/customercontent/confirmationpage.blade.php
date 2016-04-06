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
            </tr>
            {{-- */$totalprice=0;/* --}}
            {{-- */$orderid = $order[0]->order_id;/* --}}
            @foreach($order as $currentitem)
              @if($currentitem->option_id)
                {{-- */$option = $currentitem->item->option->name;/* --}}
                @if($currentitem->choice_id)
                  @if($currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',$currentitem->choice_id)->first())
                    {{-- */$optionselection = $currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',$currentitem->choice_id)->first()->name;/* --}}
                  @else
                    {{-- */$optionselection = 'No Selection';/* --}}
                  @endif
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
          </tbody>
        </table>
      </div><!-- End table container -->
    </div>
    <div  class="list-group-item text-right" id="confirm-page-btn">
    <div method="PUT" class="btn btn-default btn-lg" data-toggle="modal" data-target="#confirmation-result">Order
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
    $(".btn-lg").click(function() {
      $request = $.ajax({
        url: "{{ route('submitorderlink') }}",
        type: "get",
        data: {}
      });
    });
  });
</script>
@endsection