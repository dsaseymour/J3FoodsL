<style>
  .list-group-item-heading {
    color:black;
  }
</style>




<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#item{{$item->item_id}}">Item</a></li>
        <li><a data-toggle="tab" href="#option{{$item->item_id}}">Options</a></li>
      </ul>
      <div class="tab-content">
        <div id="item{{$item->item_id}}" class="tab-pane fade in active">
         <form method="POST" role="form" action="{{ route('edititem' , ['item' => $item->item_id] ) }}">
          {!! csrf_field() !!}
          <label class="list-group-item-heading">Category</label>
          <select class="form-control" name="category">
            @foreach ($restaurant->categories as $category)
            @if($item->category_id == $category->id)
            <option value="{{$category->id}}" selected >{{$category->category_name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endif
            @endforeach
          </select>
          <label class="list-group-item-heading">Item Name</label>
          <input type="text" class="form-control" name="name" value="{{$item->name}}" >
          <label class="list-group-item-heading">Price</label>
          <input type="text" class="form-control" name="price" value="{{$item->price}}" >
          <label class="list-group-item-heading">Image</label>
          <input type="text" class="form-control" name="image" value="{{$item->image}}" >
          <label class="list-group-item-heading">On special?</label>
          @if($item->spec_id != null)
          <input  data-toggle="collapse" data-target="#spec_price{{$item->item_id}}" type="checkbox" class="form-control" name="is_special" checked >
          <div id="spec_price{{$item->item_id}}" class ="collapse in">
            <label class="list-group-item-heading">Special Price</label>
            <input type="text" class="form-control" name="special_price" value="{{$item->special->spec_price}}">
          </div>

          @else
          <input data-toggle="collapse" data-target="#spec_price{{$item->item_id}}" type="checkbox" class="form-control" name="is_special" >
          <div id="spec_price{{$item->item_id}}" class ="collapse">
            <label class="list-group-item-heading">Special Price</label>
            <input type="text" class="form-control" name="special_price" >
          </div>
          @endif
       
      </div>
      <div id="option{{$item->item_id}}" class="tab-pane fade">
        <label class="list-group-item-heading"> Item has options? </label>
        <input data-toggle="collapse" data-target="#are_options{{$item->item_id}}" type="checkbox" class="form-control" name="are_options" >
        <div id="are_options{{$item->item_id}}" class ="collapse">
              <label class="list-group-item-heading">Text option</label>
              <input type="text" class="form-control" name="text_option">
              <hr>
              <label class="list-group-item-heading">Combobox name</label>
              <input type="text" class="form-control" name="combo_name">
              <label class="list-group-item-heading">Choose one of</label>
              <input type="text" class="form-control" name="combo_1">
              <input type="text" class="form-control" name="combo_2">
              <hr>
              <label class="list-group-item-heading">Checkbox name</label>
              <input type="text" class="form-control" name="check_name">
              <label class="list-group-item-heading">Choose any of</label>
              <input type="text" class="form-control" name="check_1">
              <input type="text" class="form-control" name="check_2">
            </div>
      </div>
    </div>
    <div class="modal-footer">
     <button type='submit' class="btn btn-primary"/>Save Changes</button>
    
     </form>
 </div>

</div>


