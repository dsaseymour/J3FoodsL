@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection
@section("styles")
  <style>
  .closed{
    opacity: 0.4;
  }

  .restaurant {
    position: relative;
    display: inline-block;
    width: 250px;
    vertical-align: top;
    background: #eeeeee;
    margin: 0 0 16px 16px;
  }

  .restaurant:hover {
    cursor: pointer;
  }

  .restaurant img {
    width: 200px;
    height: 200px;
    display: block;
    margin: auto;
  }
  
  .restaurant .name {
    margin-top: 0px;
    margin-bottom: 0px;
    color: white;
    padding: 4px;
    color: white;
    background: rgb(75, 75, 75);
  }

  .restaurant .name .title {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    width: 80%;
    padding-left: 8px;
  }

  .restaurant .name .title a {
    color: white;
  }

  .restaurant:hover .name .title {
    white-space: normal;
  }

  .restaurant .name .fave {
    float: right;
    width: 20%;
    color: #ffffff;
    text-align: right;
    font-size: 32px;
  }

  .restaurant .name .fave:hover {
    color: #ffff00;  }
  
  .restaurant .rating {
    margin: 0px;
    color: white;
    background: #787878;
    padding: 4px;
    text-align: center;
  }

  .restaurant .rating .material-icons {
    font-size: 18px;
  }
  </style>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info">
  {{ session('status') }}
</div>
@endif
{{-- */$userfavs = Auth::user()->favourites;/* --}}
<div id="customer-overview-container" class="container ">
  <div class="row ">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h1>Currently Open
          <span class="badge">{{$restaurants->count()}}</span>
        </h1>
      </div>
      <div class="panel-body">
        <h3>For More Information Click on a Restaurant Below</h3>
        <div class="row">
          <!-- <div class="restaurant" data-itemid="40">
            <div class="name">
              <h3>The Testaurant 2: Electric Boogaloo</h3>
              <a title="Add to favourites" href="{{ route('addtofavourites', ['restaurant' => 1] ) }}">
                  <span class="glyphicon glyphicon-star-empty"></span> 
              </a>
            </div>
            <img src="http://i.imgur.com/iCKb6ux.jpg">
            <h4 class="rating"><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i></h4>
          </div> -->
          @foreach($restaurants as $rest)
            <div class="restaurant" data-itemid="40">
              
              <a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">
                @if($rest->is_open == 1 )
                  <img class="open" @if($rest->image != null) src="{{$rest->image}}" @else src="https://placeholdit.imgix.net/~text?txtsize=66&txt=700%C3%97400&w=700&h=400" @endif>
                @else
                  <img  class="closed" @if($rest->image != null) src="{{$rest->image}}" @else src="https://placeholdit.imgix.net/~text?txtsize=66&txt=700%C3%97400&w=700&h=400" @endif>
                @endif
              </a>
              <div class="name">
                <h3 class="title"><a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">{{$rest->companyname}}</a></h3>
                @if ($userfavs->contains('restaurant_id',$rest->id))
                  <a title="Remove from favourites" class= "fave" href="{{ route('removefromfavourites', ['restaurant' => $rest->id] ) }}">
                    <span class="glyphicon glyphicon-star"></span>
                  </a>
                @else
                  <a title="Add to favourites" class= "fave" href="{{ route('addtofavourites', ['restaurant' => $rest->id] ) }}">
                    <span class="glyphicon glyphicon-star-empty"></span>
                  </a>
                @endif
              </div>
              <h4 class="rating">
                @include('customercontent.rating', array("rating" => $rest->aveRating()))
              </h4>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @endsection