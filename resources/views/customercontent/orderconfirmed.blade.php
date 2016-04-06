@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')

{{-- */$orderid = $order[0]->order_id;/* --}}

<div class="container">
<div class="row">
<div class="col-sm-12">
  <h1>Order Confirmed</h1>
  <div class="list-group">
    <div class="list-group-item ">
      <h4 class="list-group-item-heading">Order # {{$orderid}} Information</h4>
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
          </tbody>
        </table>
      </div><!-- End table container -->
    </div>

    <div  class="list-group-item text-right" id="confirm-page-btn">
    <a href="{{ route('customeroverviewlink' ) }}"><button type="button" class="btn btn-default" >Return</button></a>
    </div>
@endsection