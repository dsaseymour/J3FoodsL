@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
@endsection


@section('content')
@include('includes.restaurant-nav')
{{-- */use Carbon\Carbon;/* --}}

<div id="history-content-container" class="container table-responsive">

  <table class="highchart table table-condensed table-bordered" data-graph-container-before="1" data-graph-type="column">
    <thead>
        <tr>
            <th>Month</th>
            <th>Sales</th>
        </tr>
     </thead>
     <tbody>
        <tr>
            <td>{{Carbon::now()->subMonths(3)->format('F')}}</td>
            {{-- */$sum=0;/* --}}
            @foreach($threemonthorders as $order)
            {{-- */$sum=$sum+($order->item->price*$order->quantity);/* --}}
            @endforeach
            <td>{{$sum}}</td>
        </tr>
        <tr>
            <td>{{Carbon::now()->subMonths(2)->format('F')}}</td>
            {{-- */$sum=0;/* --}}
            @foreach($twomonthorders as $order)
            {{-- */$sum=$sum+($order->item->price*$order->quantity);/* --}}
            @endforeach
            <td>{{$sum}}</td>
        </tr>
        <tr>
            <td>{{Carbon::now()->subMonth()->format('F')}}</td>
            {{-- */$sum=0;/* --}}
            @foreach($lastmonthorders as $order)
            {{-- */$sum=$sum+($order->item->price*$order->quantity);/* --}}
            @endforeach
            <td>{{$sum}}</td>
        </tr>
        <tr>
            <td>{{Carbon::now()->format('F')}}</td>
            {{-- */$sum=0;/* --}}
            @foreach($currentmonthorders as $order)
            {{-- */$sum=$sum+($order->item->price*$order->quantity);/* --}}
            @endforeach
            <td>{{$sum}}</td>
        </tr>

    </tbody>
  </table>

</div>

@endsection

@section('javascript')
<script>
$(function() {
  $("#restaurantnavlink-history").addClass("active");
  $('[data-toggle="tooltip"]').tooltip();
  $('table.highchart').highchartTable();
});
</script>
@endsection
