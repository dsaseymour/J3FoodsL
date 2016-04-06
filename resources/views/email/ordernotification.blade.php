<h1>
    Newly Processed Order for {{$restaurant['companyname']}}
   </h1>
   <h2>ORDER#: {{$restaurant['companyname']}}</h2>

   <br />

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
