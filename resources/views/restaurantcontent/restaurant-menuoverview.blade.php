@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
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

  h3.name > a.btn{
    float:right;
  }


</style>

@endsection
@section('content')



<div class="container">
  @include('includes.restaurant-nav')

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

<!-- Modals !-->
@if(count($restaurant->categories) > 0)
<a class="btn btn-primary " data-toggle="modal" data-target="#item-subscreen"> <span class="glyphicon glyphicon-plus"></span> Add Item</a>
<div id="item-subscreen" class="modal fade" role="dialog">
  @include('includes.add-menu-item',compact('restaurant'))
</div>
@endif

<a class="btn btn-primary " data-toggle="modal" data-target="#category-subscreen"> <span class="glyphicon glyphicon-plus"></span> Add Category</a>
<div id="category-subscreen" class="modal fade" role="dialog">
  @include('includes.add-category')
</div>

<button class="btn btn-primary " id="savecategorylist" data-token="{{ csrf_token() }}"> Save Category List</button>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<ul id="sortable">
@foreach($restaurant->categories as $category)
<li class="menu-category" id="{{$category->id}}" style="background-color: #99FF66;" >
  <h1 style="background-color: #00ff00;">{{$category->category_name}}</h1>
  <div class="menu-items" style="background-color: #66CC66;">
    @foreach ($category->items as $item)
    <div class="menu-item" data-itemid="{{$item->item_id}}">
      <img src="{{$item->image}}"/>
      <div>
      <h3 class="name">{{$item->name}}
        <a class="btn btn-danger " href="{{ route('deleteitem' , ['item' => $item->item_id] ) }}"> 
          <span class="glyphicon glyphicon-remove"></span>
        </a> 
        <a class="btn btn-primary " data-toggle="modal" data-target="#edit-subscreen{{$item->item_id}}"> <span class="glyphicon glyphicon-edit"></span></a>
        <div id="edit-subscreen{{$item->item_id}}" class="modal fade" role="dialog">
          @include('includes.edit-item',compact('restaurant'))
        </div>
      </h3>
      </div>
      @if($item->spec_id != NULL)
      <h4 class="price"><span class="old-price">${{$item->price}}
      </span><span class="new-price">${{$item->special->spec_price}}</span>
    </h4>
    @else
    <h4 class="price">${{$item->price}}</h4>
    @endif

  </div>
  @endforeach
</div>
</li>
<hr/>
@endforeach
</ul>





</div>
@section('javascript')
<script>
  $(function() {
    $("#restaurantnavlink-menu").addClass("active");
    $('[data-toggle="tooltip"]').tooltip();

  });
</script>
@endsection
