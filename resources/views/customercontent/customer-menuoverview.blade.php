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

    .menu-item:hover {
      cursor: pointer;
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

    #sort-by {
      display: inline-block;
      width: auto;
    }
	</style>
@endsection


@section('content')

<div class="container">
	<div id="restaurant-hdrcontainer" >
		<div class="row">
			<div id="rhdr-left" class="col-sm-3">
				<img src="{{$restaurantInfo->image}}" />
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

			
			</div>
			</div>
	</div>
</div>

  <hr />




  <div class="form-group">
    <label for="sort-by">Sort by</label>
    <select id="sort-by" class="form-control">
      <option value="category">Categories</option>
      <option value="alpha-asc">Alphabetical A-Z</option>
      <option value="alpha-des">Alphabetical Z-A</option>
      <option value="price-asc">Price low-high</option>
      <option value="price-des">Price high-low</option>
    </select>
  </div>

  <div class="menu-category">
    <h1>Specials</h1>
    <div class="menu-items">
    @foreach ($restaurant->specials as $special)
      <div class="menu-item" data-itemid="{{$special->item->item_id}}">
        <img src="{{$special->item->image}}"/>
        <h3 class="name">{{$special->item->name}}</h3>
        <h4 class="price"><span class="old-price">${{$special->item->price}}</span><span class="new-price">${{$special->spec_price}}</span></h4>
      </div>
    @endforeach
    </div>
  </div>
  <hr/>

  <?php
    $sortMethod = isset($_GET["sort"]) ? $_GET["sort"] : "category";
  ?>

  @if($sortMethod == "alpha-asc" || $sortMethod == "alpha-des" || $sortMethod == "price-asc" || $sortMethod == "price-des")
    <div class="menu-items">
      <?php
        //If not sorting by category, get all items on the menu and sort them appropriately
        $items = $restaurant->menu;

        if($sortMethod == "alpha-asc"){
          //Sort by ascending alphabetical order
          $items = $items->sortBy(function($item){
            return $item->name;
          });

        } elseif ($sortMethod == "alpha-des") {
          //Sort by descending alphabetical order
          $items = $items->sortBy(function($item){
            return $item->name;
          })->reverse();

        } elseif ($sortMethod == "price-asc") {
          //Sort by ascending price order, using special prices if appropriate
          $items = $items->sortBy(function($item){
            if($item->spec_id != NULL){
              return $item->special->spec_price;
            } else {
              return $item->price;
            }
          });

        } elseif ($sortMethod == "price-des") {
          //Sort by descending price order, using special prices if appropriate
          $items = $items->sortBy(function($item){
            if($item->spec_id != NULL){
              return $item->special->spec_price;
            } else {
              return $item->price;
            }
          })->reverse();

        }
      ?>

      @foreach ($items as $item)
        <div class="menu-item" data-itemid="{{$item->item_id}}">
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
  @else

    @foreach($restaurant->categories as $category)
      <div class="menu-category">
        <h1>{{$category->category_name}}</h1>
        <div class="menu-items">
        @foreach ($category->items as $item)
          <div class="menu-item" data-itemid="{{$item->item_id}}">
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

  @endif

  <!-- Modal -->
  <div id="item-options-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Item options</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('validcustomerloginlink')}}" method="post" role="form">
            <div id="item-option-group" class="form-group"></div>
            <div id="item-quantity" class="form-group">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" min="1" max="99" value="1" class="form-control"/>
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

@section('javascript')
  <script type="text/javascript">
    //On page load
    $(document).ready(function(){
      //Set sort box to correct selection based on URL parameters
      $("#sort-by").val("<?php echo $sortMethod ?>");
      //If no valid sort was set, default to category
      if($("#sort-by").val() == null){
        $("#sort-by").val("category");
      }

      //Event handler for changing sort
      $("#sort-by").change(function(e){
        //Get current URL, without query string
        currentUrl = window.location.href.split("?")[0];

        //Redirect to this page with appropriate sort query
        window.location.replace(currentUrl + "?sort=" + e.target.value);
      });

      $(".menu-item").click(function(e){
        itemid = $(e.target).parent(".menu-item").data("itemid");
        $.get('/options/'+itemid, function(response){
          if(response != null){
            $("#item-option-group").html(response);
          }
          $("#item-options-modal").modal("show");
        });
      });
    })
  </script>
@endsection