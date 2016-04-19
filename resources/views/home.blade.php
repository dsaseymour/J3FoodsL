@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection



@section('navigation')
@include('includes.topbar')
@endsection

@section("styles")
<style>
  .image { 
   position: relative; 
   width: 800px; 
   margin:auto;
 }

 h3 {
  position: absolute; 
   top: 500px; 
   left: 25%; 
   width: 100%;
 }

 h2 { 
   position: absolute; 
   top: 400px; 
   left: 0; 
   width: 100%; 
 }

 h2 span { 
   color: white; 
   font: bold 18px/34px Helvetica, Sans-Serif; 
   letter-spacing: -1px;  
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 10px; 
 }

 h2 span.spacer {
   padding:0 5px;
 }

 .btn-login{
  color: white; 
   font: bold 24px/42px Helvetica, Sans-Serif; 
   letter-spacing: -1px;  
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 3px; 
   width:20%;
 }
</style>
@endsection


@section('content')

  <div class ="image">
    <img src="http://www.letsgotospain-event.net/wp-content/uploads/2015/04/food-and-wine-tours-spain.jpg"/>
    <h2>
      <span>
        Are you  hungry but don't want to leave the house?<span class='spacer'></span><br /><span class='spacer'></span> Here at J3 foods, we ensure that you can order delicious food right to your door!
      </span>
    </h2>
    <h3>
    <a href= "{{ route('logincust')    }}"> <button type="button" class="button btn-login" id="landinglogin-cus" >Login</button> 
    <h3>
  </div>





@endsection
<!--<div class="container-fluid" id="landingpage-container">
<div class="row" id="lpinfo">
    <h1 id="lpinfo-heading">Why use J3 Foods?</h1>
    <div class="col-md-6 col-md-offset-3">
      <div class="card card-block">
        <p class="card-text">Are you  hungry but don't want to leave the house? Here at J3 foods, we ensure that you can order delicious food right to your door!</p>
      </div>
    </div>
  </div>!-->