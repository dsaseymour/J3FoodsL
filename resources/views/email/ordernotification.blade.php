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
   foreach ($fullorderdescription['itemname_set'] as $iterate){
             echo"<p>Item ".$fullorderdescription['itemname_set'][$i]."</p>";
             echo"<p>Selected Options:".$fullorderdescription['optionname_set'][$i]."
             Selected Choices:".$fullorderdescription['choicename_set'][$i]."
             </p>";
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
