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
      border: none;
    }

    .menu-item {
      position: relative;
      display: inline-block;
      width: 250px;
      vertical-align: top;
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
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .menu-item:hover .name {
      white-space: normal;
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

    #filters .form-group {
      display: inline-block;
      width: auto;
    }

    #filters .form-group:nth-child(2) {
      vertical-align: top;
    }

    #filters .form-group:first-child {
      padding-right: 16px;
    }

    .menu-category {
      background-color: #f4f4f4;
      border: 1px solid #dddddd;
      border-radius: 2px;
      padding: 8px;
    }

    .menu-category:not(.menu-specials) {
      margin-bottom: 8px;
    }

    .menu-category h1 {
      font-size: 2em;
      font-weight: bold;
      display: inline-block;
      margin-left: 0;
    }

    .menu-category hr {
      margin-top: 10px;
      margin-bottom: 10px;
      border-color: #dddddd;
    }

    .category-title {
      padding-left: 4px;
    }

    .category-title:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }

    #rest-img {
      width: 200px;
      height: 200px;
    }

    #rhdr-info {
      padding: 12px;
      background-color: #eeeeee;
      border: 1px solid #dddddd;
      margin-top: 16px;
      margin-right: 16px;
    }

    #avgrating {
      padding: 4px 0 0 2px;
      background-color: #eeeeee;
      margin-top: 16px;
      border: 1px solid #dddddd;
      border-radius: 2px;
      width: 48%;
      margin-left: 25%
    }

    #reviews {
      margin: 16px 0 0 0;
    }

    .review {
      width: 48%;
      display: inline-block;
      background-color: #eeeeee;
      vertical-align: top;
      padding: 4px 8px 0 8px;
      border: 1px solid #dddddd;
      border-radius: 2px;
      float: right;
    }

    .review:first-child {
      float: left;
    }

    .review .rating .material-icons {
      font-size: 20px;
    }

    .review .name {
      float: right;
    }

    .review .name::before {
      content: "- ";
    }

    .review .body {
      max-height: 20px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .review .body::before {
      content: open-quote;
    }

    .review .body::after {
      content: close-quote;
    }

    .expand-category{
    display: inline;
    width: 20px;
    height: 20px;
    padding-right:100px;
    background:url('images/check-box.png') no-repeat;

  }

  .move{
    cursor:move;
  }

  .delete-category{
    float:right;
    margin-top:10px;
  }

  #restaurant-hdrcontainer{
    background-image: url("http://twoleftforks.com/wp-content/uploads/2016/02/our-ownership-header.jpg");
  }

</style>

@endsection
@section('content')



<div class="container">
  @include('includes.restaurant-nav')

  <div id="restaurant-hdrcontainer" >
    <div class="row">
      <div id="rhdr-left" class="col-sm-4 col-md-3">
        <img id="rest-img" src="{{$restaurantInfo->image}}" />
      </div>
      <div id="rhdr-center" class="col-sm-5 col-md-6 text-center">
        <div id="avgrating">
          <p>Average rating:</p>
          @for($i=0; $i<floor($restaurant->aveRating()); $i++)
            <i class="material-icons">star</i>
          @endfor
          @if(floor($restaurant->aveRating()) != ceil($restaurant->aveRating()))
            <i class="material-icons">star_half</i>
          @endif
          @for($i=0; $i<5-ceil($restaurant->aveRating()); $i++)
            <i class="material-icons">star_border</i>
          @endfor
        </div>
        <div class="row" id="reviews">
          <?php
            $reviews = $restaurant->reviews;
            if($reviews->count() >= 2){
              $reviews = $reviews->random(2);
            }
          ?>
          @foreach($reviews as $review)
            <div class="review">
              <div class="rating">
                @for($i=0; $i<$review->rating; $i++)
                  <i class="material-icons">star</i>
                @endfor
                @for($i=0; $i<5-$review->rating; $i++)
                  <i class="material-icons">star_border</i>
                @endfor
              </div>
              <p class="body">{{$review->comment}}</p>
              <p class="name">{{$review->poster->user->name}}</p>
            </div>
          @endforeach
        </div>
      </div>
      <div id="rhdr-right" class="col-sm-3">
        <div id="rhdr-info">
          <p>
          <span class="glyphicon glyphicon-map-marker"></span> 
            <a href="http://maps.google.com/?q={{{ $restaurantInfo->address or '' }}},{{{ $restaurantInfo->city or '' }}},{{$restaurantInfo->province}}">
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


<button class="btn btn-primary " id="expand-all" > Expand All</button>

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
  <div class="category-title">
        <span class="glyphicon glyphicon-plus hidden plus-minus"></span>
        <span class="glyphicon glyphicon-minus plus-minus"></span>
        <h1>{{$category->category_name}}</h1>
        <a class="btn btn-danger delete-category" href="{{ route('deletecategory' , ['category' => $category->id] ) }}">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
  </div>
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

$(".category-title").click(function(e){
        target = $(e.target);
        clickedTitle = (target.hasClass("category-title")) ? target : target.parents(".category-title");
        plusMinus = clickedTitle.find(".plus-minus");
        plusMinus.toggleClass("hidden");
        categoryBody = clickedTitle.parent().find(".menu-items");
        categoryBody.slideToggle();
      });



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
  var x = document.getElementsByClassName("category-title");
  for (index = 0; index < x.length; ++index) {
    console.log(x[index])
  }
});


</script>
@endsection
