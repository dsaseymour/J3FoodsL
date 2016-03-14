<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="{{route('validcustomerloginlink')}}" method="post" role="form">
        <div class="list-group">
                    <a href="#" class="list-group-item">
                      <h4 class="list-group-item-heading">Pizza Size</h4>
                      <label for="pizzasize" class="sr-only">Pizza Sizes</label>
                      <select class="form-control" id="pizzasize">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        <option>Extra Large</option>
                      </select>
                    </a>

                    <a href="#" class="list-group-item">
                      <h4 class="list-group-item-heading">Pizza Sauces</h4>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                    </a>

                    <a href="#" class="list-group-item">
                      <h4 class="list-group-item-heading">Pizza Toppings</h4>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                      <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                    </a>
        </div>
      <input type="hidden" value="{{Session::token()}}" name="_token" />
      </form>
    </div>
    <div class="modal-footer">
      <div class = "btn-group btn-group-lg">
        <a data-dismiss="modal"><button type="button" class="btn btn-default" >Add to Shopping Cart</button></a>
        <a data-dismiss="modal"><button type="button" class="btn btn-default" >Return</button></a>
      </div>
    </div>
  </div>
</div>
