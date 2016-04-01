@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection

@section("styles")
	<style>
    .menu-items {
      display: block;
    }

		.menu-item {
			position: relative;
			display: inline-block;
		}
	
		.menu-item img {
			width: 250px;
			height: 150px;
		}
		
		.menu-item .name {
			margin-top: 0px;
			margin-bottom: 0px;
			color: white;
			background: rgb(75, 75, 75);
			padding: 4px;
		}
		
		.menu-item .price {
			margin-top: 0px;
			color: white;
			background: rgb(120, 120, 120);
			padding: 4px;
		}

    .menu-category {
      display: block;
    }

    .old-price {
      text-decoration: line-through;
      color: rgb(180, 180, 180);
    }

    .new-price {
      padding-left: 8px;
    }
	</style>
@endsection


@section('content')
<div class="container">
	<div id="restaurant-hdrcontainer" >
		<div class="row">
			<div id="rhdr-left" class="col-sm-3">
				<img src="../../images/logoplaceholder.PNG" />
			</div>
			<div id="rhdr-center" class="col-sm-6 text-center">
				<div id="avgrating">
					<span id="avgrating-emptystar" class="glyphicon glyphicon-star-empty"></span>
					<span id="avgrating-star" class="glyphicon glyphicon-star"></span>
				</div>
			</div>
			<div id="rhdr-right" class="col-sm-3">
				<a data-toggle="collapse" data-target="#shopping-cart"><span class="glyphicon glyphicon-shopping-cart" id="rhdr-shoppingicon"  data-toggle="tooltip" title="Click to show Shopping Cart"></span></a> <?php //TODO: add a popover to explain what the button does clicking activates a popoutmenu  ?>
			<div id="rhdr-info">
				<p>
				<span class="glyphicon glyphicon-map-marker"></span> 
					<a href="http://maps.google.com/?q=
						{{{ $restaurantInfo->address or '' }}},
						{{{ $restaurantInfo->city or '' }}},
						{{$restaurantInfo->province}}">
						{{{ $restaurantInfo->address or 'N/A' }}}
					</a>
				</p>

				<p>
				<span class="glyphicon glyphicon-earphone"></span> {{$restaurantInfo->phoneno}}
				</p>

				<p>
				<span class="glyphicon glyphicon-envelope"></span> {{$restaurant->email}}
				</p>

			</div>
			</div>
	</div>
</div>

  <hr />





  

  <div class="menu-category">
    <h1>Specials</h1>
    <div class="menu-items">
    @foreach ($restaurant->specials as $special)
      <div class="menu-item">
        <img src="{{$special->item->image}}"/>
        <h3 class="name">{{$special->item->name}}</h3>
        <h4 class="price"><span class="old-price">${{$special->item->price}}</span><span class="new-price">${{$special->spec_price}}</span></h4>
      </div>
    @endforeach
    </div>
  </div>
  <hr/>



  @foreach($restaurant->categories as $category)
    <div class="menu-category">
      <h1>{{$category->category_name}}</h1>
      <div class="menu-items">
      @foreach ($category->items as $item)
        <div class="menu-item">
          <img src="{{$item->image}}"/>
          <h3 class="name">{{$item->name}}</h3>
          @if($item->spec_id != NULL)
            <h4 class="price"><span class="old-price">${{$item->price}}</span><span class="new-price">${{$item->special->spec_price}}</span></h4>
          @else
            <h4 class="price">${{$item->price}}</h4>
          @endif
        </div>
      @endforeach
      </div>
    </div>
    <hr/>
  @endforeach


  <!-- Modal -->
  <div id="item-subscreen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{route('validcustomerloginlink')}}" method="post" role="form">
            <div class="list-group">
                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Size</h4>
                          <label for="pizzasize" class="sr-only">Pizza Sizes</label>
                          <select class="form-control" id="pizzasize">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                          </select>
                        </a>

                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Sauces</h4>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                        </a>

                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Toppings</h4>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                        </a>
            </div>
          <input type="hidden" value="{{Session::token()}}" name="_token" />
          </form>
        </div>
        <div class="modal-footer">
          <div class = "btn-group btn-group-lg">
            <a data-dismiss="modal"><button type="button" class="btn btn-default" >Add to Shopping Cart</button></a>
            <a data-dismiss="modal"><button type="button" class="btn btn-default" >Return</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@include('includes.shoppingcart')

@endsection
