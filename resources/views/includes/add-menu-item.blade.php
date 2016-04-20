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
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" class="text-input" name="option_type" value="textbox"> Textbox
                </label>
                <label class="radio-inline">
                  <input type="radio" class="select-one" name="option_type" value="combobox"> Select one option
                </label>
                <label class="radio-inline">
                  <input type="radio" class="select-many" name="option_type" value="checkbox"> Select many options
                </label>
              </div>
              <div>
                <div id="text_option" class="options collapse text-input" >
                  <label class="list-group-item-heading">Text option</label>
                  <input type="text" class="form-control" name="text_option">
                </div>
                <div id="combo_option" class="options collapse select-one">
                  <label class="list-group-item-heading">Combobox name</label>
                  <input type="text" class="form-control" name="combo_name">
                  <label class="list-group-item-heading">Choose one of</label>
                  <input type="text" class="form-control" name="combo_1">
                  <input type="text" class="form-control" name="combo_2">
                  <input type="text" class="form-control" name="combo_3">
                  <input type="text" class="form-control" name="combo_4">
                  <input type="text" class="form-control" name="combo_5">
                  <input type="text" class="form-control" name="combo_6">
                </div>
                <div id="check_option" class="options collapse select-many">
                  <label class="list-group-item-heading">Checkbox name</label>
                  <input type="text" class="form-control" name="check_name">
                  <label class="list-group-item-heading">Choose any of</label>
            
                  <input type="text" class="form-control" name="check_1">
                  <input type="text" class="form-control" name="check_2">
                  <input type="text" class="form-control" name="check_3">
                  <input type="text" class="form-control" name="check_4">
                  <input type="text" class="form-control" name="check_5">
                  <input type="text" class="form-control" name="check_6">
                </div>
              </div>
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


