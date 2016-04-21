<style>
  .list-group-item-heading {
    color:black;
    font-size: 1em;
  }
</style>




<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
  <div class="modal-header list-group-item-heading">
      {{$item->name}}
    </div>
    <div class="modal-body">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#item{{$item->item_id}}">Item</a></li>
        <li><a data-toggle="tab" href="#option{{$item->item_id}}">Options</a></li>
      </ul>
      <div class="tab-content">
        <div id="item{{$item->item_id}}" class="tab-pane fade in active">
         <form method="POST"  role="form" action="{{ route('edititem' , ['item' => $item->item_id] ) }}">
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
          <input data-toggle="collapse" data-target="#are_options{{$item->item_id}}" type="checkbox" class="form-control" name="are_options" @if($item->option_id != null) checked @endif>
          <div id="are_options{{$item->item_id}}" @if($item->option_id == null) class ="collapse" @else  class ="collapse in" @endif>
            <div class="form-group">
              <label class="radio-inline list-group-item-heading">
                <input type="radio" class="text-input" name="option_type" value="textbox" @if($item->option_id != null) @if($item->option->type == "text") checked @endif @endif> <strong>Textbox</strong>
              </label>
              <label class="radio-inline list-group-item-heading">
                <input type="radio" class="select-one" name="option_type" value="combobox" @if($item->option_id != null) @if($item->option->type == "combo") checked @endif @endif> <strong>Select one option</strong>
              </label>
              <label class="radio-inline list-group-item-heading">
                <input type="radio" class="select-many" name="option_type" value="checkbox" @if($item->option_id != null) @if($item->option->type == "check") checked @endif @endif> <strong>Select many options</strong>
              </label>
            </div>
            <div>
              <div id="text_option"  @if($item->option_id != null) @if($item->option->type == "text") class="options collapse in text-input" @else class="options collapse text-input" @endif @else class="options collapse text-input" @endif  >
                <label class="list-group-item-heading">Text option</label>
                <input type="text" class="form-control" name="text_option" @if($item->option_id != null) @if($item->option->type == "text") value="{{$item->option->name}}" @endif @endif  >
              </div>
              <div id="combo_option" @if($item->option_id != null) @if($item->option->type == "combo") class="options collapse in select-one"   @else class="options collapse select-one" @endif  @else class="options collapse select-one"@endif>
                <label class="list-group-item-heading">Combobox name</label>
                <input type="text" class="form-control" name="combo_name" @if($item->option_id != null) @if($item->option->type == "combo") value="{{$item->option->name}}" @endif @endif>
                <label class="list-group-item-heading">Choose one of</label>
                @if($item->option_id != null) 
                  @if($item->option->type == "combo")
                  {{-- */$currentorder=1;/* --}}
                    @foreach($item->option->choices as $choice)
                      <input type="text" class="form-control" name="combo_{{$currentorder}}" value="{{$choice->name}}">
                       {{-- */$lastid=$currentorder; $currentorder = $currentorder + 1;/* --}}
                    @endforeach
                    @for ($i = $lastid; $i < 6; $i++)
                    <input type="text" class="form-control" name="combo_{{$i}}">
                    @endfor
                  @else
                  <input type="text" class="form-control" name="combo_1">
                  <input type="text" class="form-control" name="combo_2">
                  <input type="text" class="form-control" name="combo_3">
                  <input type="text" class="form-control" name="combo_4">
                  <input type="text" class="form-control" name="combo_5">
                  <input type="text" class="form-control" name="combo_6">
                  @endif
                @else
                  <input type="text" class="form-control" name="combo_1">
                  <input type="text" class="form-control" name="combo_2">
                  <input type="text" class="form-control" name="combo_3">
                  <input type="text" class="form-control" name="combo_4">
                  <input type="text" class="form-control" name="combo_5">
                  <input type="text" class="form-control" name="combo_6">
                @endif
              </div>
              <div id="check_option" @if($item->option_id != null) @if($item->option->type == "check") class="options collapse in select-many"  @else class="options collapse select-many" @endif @else class="options collapse select-many" @endif>
                <label class="list-group-item-heading">Checkbox name</label>
                <input type="text" class="form-control" name="check_name" @if($item->option_id != null) @if($item->option->type == "check") value="{{$item->option->name}}" @endif @endif>
                <label class="list-group-item-heading">Choose any of</label>
                @if($item->option_id != null) 
                  @if($item->option->type == "check")
                  {{-- */$currentorder=1;/* --}}
                    @foreach($item->option->choices as $choice)
                    <input type="text" class="form-control" name="check_{{$currentorder}}" value="{{$choice->name}}">

                    {{-- */$lastid=$currentorder; $currentorder = $currentorder + 1;/* --}}
                    @endforeach
                    @for ($i = $lastid; $i < 6; $i++)
                    <input type="text" class="form-control" name="combo_{{$i}}">
                    @endfor
                    @else
                      <input type="text" class="form-control" name="check_1">
                      <input type="text" class="form-control" name="check_2">
                      <input type="text" class="form-control" name="check_3">
                      <input type="text" class="form-control" name="check_4">
                      <input type="text" class="form-control" name="check_5">
                      <input type="text" class="form-control" name="check_6">
                  @endif
                  @else
                      <input type="text" class="form-control" name="check_1">
                      <input type="text" class="form-control" name="check_2">
                      <input type="text" class="form-control" name="check_3">
                      <input type="text" class="form-control" name="check_4">
                      <input type="text" class="form-control" name="check_5">
                      <input type="text" class="form-control" name="check_6">
                @endif
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
         <button type='submit' class="btn btn-primary"/>Save Changes</button>

       </form>
     </div>

   </div>


