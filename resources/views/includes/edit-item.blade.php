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
      <form method="POST" role="form" action="{{ route('edititem' , ['item' => $item->item_id] ) }}">
        {!! csrf_field() !!}
        <div >
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
          <input  data-toggle="collapse" data-target="#spec_price" type="checkbox" class="form-control" name="is_special" checked >
          <div id="spec_price" class ="collapse in">
            <label class="list-group-item-heading">Special Price</label>
            <input type="text" class="form-control" name="special_price" value="{{$item->special->spec_price}}">
          </div>
          
          @else
          <input data-toggle="collapse" data-target="#spec_price" type="checkbox" class="form-control" name="is_special" >
          <div id="spec_price" class ="collapse">
            <label class="list-group-item-heading">Special Price</label>
            <input type="text" class="form-control" name="special_price" >
          </div>
          @endif
        </div>
      </div>
      <div class="modal-footer">
       <button type='submit' class="btn btn-primary"/>Save Changes</button>
     </form>
   </div>
 </div>
</div>
