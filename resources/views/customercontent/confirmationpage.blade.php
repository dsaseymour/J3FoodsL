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
            @foreach($order as $nextitem)
            {{-- */$itemname = DB::table('items')->where('item_id',$nextitem->item_id)->first();/* --}}
            {{-- */$option = DB::table('options')->where('item_id',$nextitem->item_id)->where('id',$nextitem->option_id)->first();/* --}}
            {{-- */$optionselection = DB::table('option_choices')->where('option_id',$nextitem->option_id)->where('choice_id',$nextitem->choice_id)->first();/* --}}
            {{-- */$totalprice = $totalprice + (($nextitem->quantity)*($itemname->price));/* --}}
            <tr>
              <td>{{$nextitem->quantity}}</td>
              <td>{{$itemname->name}}</td>
              <td>{{$option->name.": ".$optionselection->name}}</td>
              <td>${{$itemname->price}}</td>
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
    <div class="btn btn-default btn-lg" data-toggle="modal" data-target="#confirmation-result">Order</div>
    </div>
  </div>
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
        <a href="{{ route('orderconfirmlink'  ) }}"><button type="button" class="btn btn-default" >Return</button></a>
      </div>
    </div>
  </div>
</div>

@endsection
