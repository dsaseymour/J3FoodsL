<h1>We regret to inform you that your submitted order has been cancelled.</h1>

  @if($order->first())
      <h4 class="list-group-item-heading">Order Information</h4>
        <table class="table table-condensed table-bordered">
          <tbody>
            <tr>
              <td>Quantity</td>
              <td>Menu Item</td>
              <td>Options</td>
              <td>Price</td>
              <td>Remove</td>
            </tr>
            {{-- */$totalprice=0;/* --}}
            {{-- */$orderid = $order[0]->order_id;/* --}}
            @foreach($order as $currentitem)
              @if($currentitem->option_id)
                {{-- */$option = $currentitem->item->option->name;/* --}}
                @if($currentitem->choice_id)
                  @if($currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',$currentitem->choice_id)->first())
                    {{-- */$optionselection = $currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',$currentitem->choice_id)->first()->name;/* --}}
                  @else
                    {{-- */$optionselection = 'No Selection';/* --}}
                  @endif
                @else
                  {{-- */$optionselection = 'No Selection';/* --}}
                @endif
              @else
                {{-- */$option = 'No Additional Options';/* --}}
                {{-- */$optionselection = 'No Selection';/* --}}
              @endif
            {{-- */$totalprice = $totalprice + (($currentitem->quantity)*($currentitem->item->price));/* --}}
            <tr>
              <td>{{$currentitem->quantity}}</td>
              <td>{{$currentitem->item->name}}</td>
              <td>{{$option.": ".$optionselection}}</td>
              <td>${{$currentitem->item->price}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>



      <h4 class="list-group-item-heading">Price </h4>
        <table class="table table-condensed table-bordered">
          <tbody>
            <tr>
              <td>Subtotal</td>
              <td>${{$totalprice}}</td>
            </tr>

            <tr>
              <td>Tax</td>
              <td>${{number_format($totalprice*0.13,2)}}</td>
            </tr>

            <tr>
              <td>Total Purchases</td>
              <td>${{number_format($totalprice*1.13,2)}}</td>
            </tr>

            <tr>
              <td>Minimum Order Fee</td>
              <td>$7</td>
            </tr>
          </tbody>
        </table>
  @endif



<h2>Contact Details:</h2>
<h2>Name: {{$customer['name']}}</h2>
<h2>Email: {{$customer['email']}}</h2>
<h2>Address: {{$customer['address']}}</h2>

<p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p>
