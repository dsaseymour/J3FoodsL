@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
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
          <span class="badge">{{$restaurants->count()}}</span></h1>
        </div>


        <div class="panel-body">
          <h3>For More Information Click on a Restaurant Below</h3>

          <div class="row">
            @foreach ($restaurants as $rest)
            <div class="col-sm-3 text-center">
              <a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">
               @if($rest->is_open == 1 )
               <img class="img-responsive" @if($rest->image != null) src="{{$rest->image}}" @else src="https://placeholdit.imgix.net/~text?txtsize=66&txt=700%C3%97400&w=700&h=400" @endif>
               @else
               <img style="opacity: 0.4;" class="img-responsive" @if($rest->image != null) src="{{$rest->image}}" @else src="https://placeholdit.imgix.net/~text?txtsize=66&txt=700%C3%97400&w=700&h=400" @endif>
               @endif
             </a>
             <h5>
              <a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">{{$rest->companyname}}</a>
              <!--if this userfavourites has restraunt-->
              @if ($userfavs->contains('restaurant_id',$rest->id))
              <a class= "btn btn-default" href="{{ route('removefromfavourites', ['restaurant' => $rest->id] ) }}">
                <span class="glyphicon glyphicon-star"></span>
                @else
                <a class= "btn btn-default" href="{{ route('addtofavourites', ['restaurant' => $rest->id] ) }}">
                  <span class="glyphicon glyphicon-star-empty"></span> 
                  @endif
                </a>
              </h5>
            </div>
            @endforeach
          </div>

        </div>
      </div>

    </div>
    @endsection
