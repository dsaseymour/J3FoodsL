<h1>
    Newly Processed Order for {{$restaurant['companyname']}}
   </h1>
   <h2>ORDER#: {{$restaurant['companyname']}}</h2>

   <br />

   <h2>Order Summary:</h2>
   pizza x1
   chicken wings x3

   <h2>Contact Details:</h2>
   <p>
      {{$customer['name']}}
      {{$customer['address']}}
   </p>

   <h2>Sub-Total:</h2> $32.00
   <h2>Total:</h2> $60.00
