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
      <h4 class="list-group-item-heading">Order details</h4>
      <div class="table-responsive"><!-- Start table container -->
        <table class="table table-condensed table-bordered">
          <tbody>
            <tr>
              <td>1x</td>
              <td>Super Burger. Sauce Option: Garlic</td>
              <td>$8.00</td>
            </tr>

            <tr>
              <td>1x</td>
              <td>Super Burger. Sauce Option: Garlic</td>
              <td>$8.00</td>
            </tr>

            <tr>
              <td>1x</td>
              <td>Super Burger. Sauce Option: Garlic</td>
              <td>$8.00</td>
            </tr>

            <tr>
              <td>1x</td>
              <td>Super Burger. Sauce Option: Garlic</td>
              <td>$8.00</td>
            </tr>
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
              <td>$32</td>
            </tr>

            <tr>
              <td>Tax</td>
              <td>$4</td>
            </tr>

            <tr>
              <td>Total Purchases</td>
              <td>$36</td>
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
        <a href="../../php/customercontent/customeroverview.php"><button type="button" class="btn btn-default" >Return</button></a>
      </div>
    </div>
  </div>
</div>

@endsection
