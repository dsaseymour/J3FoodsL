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
   height:100vh;
   width: 100%;
   margin:0px;
   top:-50px;
    background-image: url("http://i.imgur.com/eIz2pGr.jpg"); 
   /*background-image: url("http://i.imgur.com/OMdN4u7.jpg");*/
   background-size: cover;
    background-position-y: 80%;  
   /*background-position-y:45%;*/
 }

 #login {
  position: absolute; 
  top: 45%; 
  left: 34%; 
  width: 100%;
}

#guest{
  position: absolute; 
  top: 45%;
  left: 50%;
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

/* New Styling*/

body {
  overflow:hidden;
  margin:0px !important;
}

.header-textbox {
  background: rgba(0, 0, 0, 0.5);
}

.btn-flat {
  border: 0px;
  border-radius:25px;
  width:150px;
}

.btn-flat:hover {
  background-color: rgba(0,0,0,0.9);
}

.the-buttons {
  max-width:400px;
}

h1 {
    padding-top: 2%;
    color: white;
    font-size: 70px;
    margin-left: 25%;
    max-width:700px;
    text-align:center;
}



</style>
@endsection


@section('content')

<div class ="image">
<!--   <img src="http://imgur.com/eIz2pGr.jpg"/> -->
  
  <div class="header-textbox">
    <h1>Welcome to J3 Foods!</h1>
  </div>

  <div class="the-buttons">
    <span id="login">
    <a href= "{{ route('logincust')    }}"> 
      <button type="button" class="button btn-login btn-flat" id="landinglogin-cus" >Login</button>
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
        <button type="submit" class="btn-login btn-flat" href="">Guest</button>
        </div>
      </div>
    </form>
  </span>
  </div>

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