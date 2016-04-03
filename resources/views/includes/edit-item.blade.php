<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form method="POST" role="form" action="{{ route('edititem' , ['item' => $item->item_id] ) }}">
        {!! csrf_field() !!}
        <div class="list-group">
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
        </div>
      </div>
      <div class="modal-footer">
       <button type='submit' class="btn btn-primary"/>Save Changes</button>
    </form>
  </div>
</div>
</div>
