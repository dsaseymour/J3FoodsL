@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar-logged')
@endsection


@section('content')
@include('includes.restaurant-nav')
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
            <td>January</td>
            <td>8000</td>
        </tr>
        <tr>
            <td>February</td>
            <td>12000</td>
        </tr>
        <tr>
            <td>March</td>
            <td>12000</td>
        </tr>
        <tr>
            <td>April</td>
            <td>12000</td>
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
