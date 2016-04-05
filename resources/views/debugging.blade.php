<form action="{{route('createorder')}}" method="post" role="form">
      <div class="form-group">
        <label class="sr-only" for="item_id">Item Id:</label>
        <input type="text" class="form-control" name="item_id" id="item_id" placeholder="item_id"/>

        <label class="sr-only" for="restaurant_id">Restaurant Id:</label>
        <input type="text" class="form-control" name="restaurant_id" id="restaurant_id" placeholder="restaurant_id"/>

        <label class="sr-only" for="customer_id">Customer Id:</label>
        <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="customer_id"/>

        <label class="sr-only" for="quantity">Quantity:</label>
        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity"/>

        <label class="sr-only" for="special_instructions">Special Instructions:</label>
        <input type="text" class="form-control" name="special_instructions" id="special_instructions" placeholder="Special Instructions"/>
      </div>

<button type='submit'  class="login-btn btn btn-lg btn-primary  center-block btn-block" />Submit Order</button>

<input type="hidden" value="{{Session::token()}}" name="_token" />
</form>
