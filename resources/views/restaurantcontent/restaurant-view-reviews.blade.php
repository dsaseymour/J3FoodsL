@extends('layouts.master')
@section('title')
J3 Foods - Error
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
@endsection

@section("styles")
  <style>
  	#reviews {
  		background-color: #99ccff;
  		border-color: #ebccd1;
  		border-radius: 4px;
  		color: #004d99;
  		text-align: center;
  	}

  	#title {
  		font-weight: bolder;
  	}

  	#reviews hr {
  		border-color: #ebccd1;
  		margin: 10px 0px 10px 0px;
  	}

    .review-content{
      color:black;
      word-wrap: break-word;
    }
  </style>
@endsection


@section('content')
@include('includes.restaurant-nav')
	<div class="row">
		<div class="spacer col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
		<div id="reviews" class="container col-lg-4 col-md-6 col-sm-8 col-xs-10">
			<h1 id="title">Reviews</h1>
      @if(count($reviews !=  0))
      @foreach ($reviews as $review)
			<hr/>
      <div class="row">
        <p class="review-content col-md-2"> {{$review->rating}}/5 </p>
        <p class="review-content col-md-8"> {{$review->comment}}</p>
        <p class="review-content col-md-2"> 
          <a class="btn btn-danger " href="{{ route('deletereview' , ['reviewer' => $review->customer_id] ) }}"> 
            <span class="glyphicon glyphicon-remove"></span>
          </a> 
          <a class="btn btn-success" href="{{ route('toggleshowingreview' , ['reviewer' => $review->customer_id] ) }}"> 
          @if($review->is_displaying == 1)
            <span class="glyphicon glyphicon-ok-sign"></span>
          @else
            <span class="glyphicon glyphicon-ok-circle"></span>
          @endif
          </a> 
        </p>
      </div>
      @endforeach
      @endif
		</div>
		<div class="spacer col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
	</div>
@endsection