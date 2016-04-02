<label for="item-option">{{$item->option->name}}</label>
<select id="item-option" class="form-control">
	@foreach($item->option->choices as $choice)
		<option value="{{$choice->id}}">{{$choice->name}}</option>
	@endforeach
</select>