<table class="table table-condensed table-bordered">
	<tbody>
		<tr>
			<td>Quantity</td>
			<td>Menu Item</td>
			<td>Options</td>
		</tr>
		@foreach($orders as $order)
		{{$order->item->option}}
		<tr>
			<td>{{$order->quantity}}</td>
			<td>{{$order->item->name}}</td>
			@if ($order->item->option != null)
			<td>{{$order->item->option->name}}: 
			{{-- */$choices=explode(',',$order->choice);/* --}}
			@foreach ($choices as $choice)
				{{-- */  $query = DB::table('option_choices')->where('option_id',$order->item->option->id)->where('choice_id',$choice)->first(); /* --}}
				{{$query->name}},
			@endforeach
			</td>
			@else
			<td></td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>