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

 #login {
  position: absolute; 
  top: 45%; 
  left: 25%; 
  width: 100%;
}

#guest{
  position: absolute; 
  top: 45%;
  left: 60%;
  color:white;
}

h2 { 
 position: absolute; 
 top: 400px; 
 left: 0; 
 width: 100%; 
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

.btn-guest{
 width:500%;
}
</style>
@endsection


@section('content')

<div class ="image">
  <img src="http://www.letsgotospain-event.net/wp-content/uploads/2015/04/food-and-wine-tours-spain.jpg"/>
  <span id="login">
    <a href= "{{ route('logincust')    }}"> 
      <button type="button" class="button btn-login btn-primary" id="landinglogin-cus" >Login</button>
    </a> 
  </span>
  <span id="guest">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register')}}">
      {!! csrf_field() !!}
      <input type="hidden" class="form-control" name="isRestaurant" value="0">
      <input type="hidden" class="form-control" name="isGuest" value="1">
      <input type="hidden" class="form-control" name="name" value="guest">
      <input type="hidden" class="form-control" name="email" value={{$guestemail}}>
      <input type="hidden" class="form-control" name="password" value="password">
      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn-guest btn-link btn-login btn-primary" href="">Guest</button>
        </div>
      </div>
    </form>
  </span>

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