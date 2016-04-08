<h1>Thank you for ordering via J3Foods​. Your business is greatly appreciated.</h1>

<h2>ORDER#: {{$order['order_id']}}</h2>
<h2>ORDER DATE: {{$order['time_in']}}</h2>

<!--order summary  -->
<h2>Order Summary:</h2>
<?php
$totals;
$i=0;
foreach ($fullorderdescription['itemname_set'] as $iterate){
          echo"<p>Item ".$fullorderdescription['itemname_set'][$i]."</p>";
          if(isset($fullorderdescription['optionname_set'][$i])){ echo"<p>Selected Options:".$fullorderdescription['optionname_set'][$i]."</p>"; }
          if(isset($fullorderdescription['choicename_set'][$i])){echo"<p>Selected Choices:".$fullorderdescription['choicename_set'][$i]."</p>"; }
          echo"
          <p>Special Instructions:".$fullorderdescription['specialinstruction_set'][$i]."
          </p>";
          echo"<p> Quantity:".$fullorderdescription['orderquantity_set'][$i]."
          Price: ".$fullorderdescription['itemprice_set'][$i]."
          </p>";
          $totals[$i]=$fullorderdescription['orderquantity_set'][$i]*$fullorderdescription['itemprice_set'][$i];
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
