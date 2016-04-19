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
			{{$order->choice}}
			</td>
			@else
			<td></td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>