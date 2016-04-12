@extends('layouts.master')
@section('title')
J3 Foods - Error
@endsection

@section('navigation')
	@if(\Auth::user()->isRestaurant)
		@include('includes.restaurant-topbar')
	@else
		@include('includes.customer-topbar')
	@endif
@endsection

@section("styles")
  <style>
  	#error {
  		background-color: #f2dede;
  		border-color: #ebccd1;
  		border-radius: 4px;
  		color: #a94442;
  		text-align: center;
  	}

  	#error-title {
  		font-weight: bolder;
  	}

  	#error hr {
  		border-color: #ebccd1;
  		margin: 10px 0px 10px 0px;
  	}
  </style>
@endsection


@section('content')
	<div class="row">
		<div class="spacer col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
		<div id="error" class="container col-lg-4 col-md-6 col-sm-8 col-xs-10">
			<h1 id="error-title">{{(session()->has("error-title")) ? session("error-title") : "Error"}}</h1>
			<hr />
			<p id="error-message">{{(session()->has("error-message")) ? session("error-message") : "Something went wrong"}}</p>
		</div>
		<div class="spacer col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
	</div>
@endsection