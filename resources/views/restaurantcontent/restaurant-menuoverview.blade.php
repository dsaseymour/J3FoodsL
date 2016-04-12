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
    background: #f2f2f2;
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

  .menu-category {
    border-style: solid;
    border-width: 1px;
    background-color: rgb(38, 102, 177);
    margin-bottom: 15px;
    margin-top:15px;
  }

  .menu-category > h1{
     background-color: #f2f2f2;
     padding-left: 10px;
  }

  .menu-category > .menu-items{
    background-color: #f2f2f2;
  }

  .expand-category{
    display: inline;
    width: 20px;
    height: 20px;
   padding-right:100px;
  }

  .move{
    cursor:move;
  }

  #customer-review{
    display:block;
    padding-top:40px;
  }

  #average-rating{
    margin-top:40px;
  }

 #logo {
    height: auto; 
    width: auto; 
    max-width: 200px; 
    max-height: 200px;
}
   

</style>

@endsection
@section('content')



<div class="container">
  @include('includes.restaurant-nav')

  <div id="restaurant-hdrcontainer" >
    <div class="row">
      <div id="rhdr-left" class="col-sm-3">
        <img id="logo" src="{{$restaurantInfo->image}}" />
      </div>
      <div id="rhdr-center" class="col-sm-6 text-center">
      @foreach($reviews as $review)
        <span id="customer-review"> {{$review->comment}} I give it {{$review->rating}}/5</span>
      @endforeach
        <span id ="average-rating"> Average {{$averageReview}} / 5</span>
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


<button class="btn btn-primary " id="expand-all" > Expand All (Broken currently)</button>

<button class="btn btn-primary " id="savecategorylist" data-token="{{ csrf_token() }}"> Save Category List</button>

<meta name="csrf_token" content="{{ csrf_token() }}" />



  <?php
    $categories = $restaurant->categories;
    $categories = $categories->sortBy(function($category){
      return $category->category_order;
    });
  ?>





<ul id="sortable">
@foreach($categories as $category)
<li class="menu-category move" id="{{$category->id}}">
  <h1 ><input data-toggle="collapse" data-target="#category_{{$category->category_name}}" type="checkbox" class="form-control expand-category" name="are_options" checked>{{$category->category_name}} </h1>
  <div id="category_{{$category->category_name}}" class ="collapse in menu-section">
  <div class="menu-items" >
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

@endforeach
</ul>





</div>
@section('javascript')
<script>
  $(function() {
    $("#restaurantnavlink-menu").addClass("active");
    $('[data-toggle="tooltip"]').tooltip();

  });

$('input[type=radio]').on('change', function () {
    if (!this.checked) return
    $('.options').not($('div.' + $(this).attr('class'))).slideUp();
    $('.collapse.' + $(this).attr('class')).slideDown();
});

$('#expand-all').click(function() {
  $('.expand-category').removeClass("collapsed");
  $('.menu-section').slideDown();
  $('.menu-section').addClass("in");
});

</script>
@endsection
