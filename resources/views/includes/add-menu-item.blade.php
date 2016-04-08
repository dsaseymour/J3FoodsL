<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#item">Item</a></li>
        <li><a data-toggle="tab" href="#option">Options</a></li>
      </ul>
      <div class="tab-content">
        <div id="item" class="tab-pane fade in active">
          <form method="POST" role="form" action="{{ route('additem') }}">
            {!! csrf_field() !!}
            <div class="list-group">
              <label class="list-group-item-heading">Category</label>
              <select class="form-control" name="category">
                @foreach ($restaurant->categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
              </select>
              <label class="list-group-item-heading">Item Name</label>
              <input type="text" class="form-control" name="name" >
              <label class="list-group-item-heading">Price</label>
              <input type="text" class="form-control" name="price" >
              <label class="list-group-item-heading">Image</label>
              <input type="text" class="form-control" name="image" >


            </div>
          </div>
           <div id="option" class="tab-pane fade">
            <label class="list-group-item-heading"> Item has options? </label>
            <input data-toggle="collapse" data-target="#are_options" type="checkbox" class="form-control" name="are_options" >
            <div id="are_options" class ="collapse">
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
         </div>
       </form><!-- have to end form after button !-->
     </div>
   </div>
 </div>
