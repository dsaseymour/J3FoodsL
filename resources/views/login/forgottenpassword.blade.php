@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection

@section('content')

<!--one record
{{$requestdesc['itemname_set'][1]}}
{{$requestdesc['optionname_set'][1]}}
{{$requestdesc['choicename_set'][1]}}
{{$requestdesc['specialinstruction_set'][1]}}
{{$requestdesc['orderquantity_set'][1]}}
{{$requestdesc['itemprice_set'][1]}}
below-->




<h1>Thank you for ordering via J3Foods​. Your business is greatly appreciated.</h1>

<h2>ORDER#: {{$order['order_id']}}</h2>
<h2>ORDER DATE: {{$order['submit_time']}}</h2>

<!--order summary  -->
<h2>Order Summary:</h2>
<?php
$totals;
$i=0;
foreach ($fullorderdescription as $orderdescription){
          echo"<p>Item ".$requestdesc['itemname_set'][$i]."</p>";
          echo"<p>Selected Options:".$requestdesc['optionname_set'][$i]."
          Selected Choices:".$requestdesc['choicename_set'][$i]."
          </p>";
          echo"
          <p>Special Instructions:".$requestdesc['specialinstruction_set'][$i]."
          </p>";
          echo"<p> Quantity:".$requestdesc['orderquantity_set'][$i]."
          Price: ".$requestdesc['itemprice_set'][$i]."
          </p>";
          $totals[$i]=$requestdesc['orderquantity_set'][$i]*$requestdesc['itemprice_set'][$i];
          $i++;
}

echo"<h2>Sub-Total:</h2>";
echo"<h2>Total:".array_sum($totals)."</h2>";
?>
<!--order summary ends  -->

<h2>Contact Details:</h2>
<h2>Name: {{$customer['name']}}</h2>
<h2>Email: {{$customer['email']}}</h2>
<h2>Address: {{$customer['address']}}</h2>

<p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p>










<!--
<section id="forgotpassword-section">
<div class="container text-center" id="forgotpassword-container">
    <div class="row " id='forgotpassword-block'>

          <div class="col-md-5 panel panel-default col-centered " >
            <div class="panel-body">
                <div class="panel-header">
                    <h3>Reset Your Password</h3>
                </div>
                        <form action="#" method="post" role="form">
                            <h4>Enter Your Email: </h4>
                            <div class="input-group">
                              <span class="input-group-addon "><span class="glyphicon glyphicon-envelope"></span></span>
                              <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>

                </div>
                <div class="panel-footer text-right">
                        <input type="submit" class="button button-block " name="resendemail" id="resendemail" value="Submit">
                        <input type="submit" class="button button-block " name="resendemail" id="resendemail" value="Cancel">
                </div>
                <input type="hidden" value="{{Session::token()}}" name="_token" />
                </form>
            </div>
</div>
</div>
</section> -->
@endsection
