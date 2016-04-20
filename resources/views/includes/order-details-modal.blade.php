<table class="table table-condensed table-bordered">
	<tbody>
		<tr>
			<td>Quantity</td>
			<td>Menu Item</td>
			<td>Options</td>
		</tr>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->quantity}}</td>
			<td>{{$order->item->name}}</td>
			@if ($order->item->option != null)
			<td>{{$order->item->option->name}}:
			@if($order->item->option->type == "check")
			@if($order->choice != null)
				{{-- */$choices=explode(',',$order->choice);/* --}}
				@foreach ($choices as $choice)
				{{-- */  $query = DB::table('option_choices')->where('option_id',$order->item->option->id)->where('choice_id',$choice)->first(); /* --}}
				{{$query->name}},
				@endforeach
				@else
					No options selected
				@endif
			@elseif($order->item->option->type == "combo")
				@if($order->choice != null)
				{{-- */  $query = DB::table('option_choices')->where('option_id',$order->item->option->id)->where('choice_id',$order->choice)->first(); /* --}}
				{{$query->name}}
				@else
					No Option Selected
				@endif
			@else
				{{$order->choice}}
			@endif
			</td>
			@else
			<td></td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>