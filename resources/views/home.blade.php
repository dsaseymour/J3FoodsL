@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection





@section("styles")
<style>



 #login {
  position: absolute; 
  color:white;
  left: 25%; 
}

#guest{
  position: absolute; 
  right: 25%;
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
  overflow:auto;
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
  max-width:40%;
  padding-top:15%;
}

h1 {
    padding-top: 2%;
    color: white;
    font-size: 70px;
    margin-left: 25%;
    max-width:50%;
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
    <a href= "{{ route('logincust')    }}"> 
      <button id="login"type="button" class="button btn-login btn-flat" id="landinglogin-cus" >Login</button>
    </a> 
    <form  role="form" method="POST" action="{{ url('/register')}}">
      {!! csrf_field() !!}
      <input type="hidden" class="form-control" name="isRestaurant" value="0">
      <input type="hidden" class="form-control" name="isGuest" value="1">
      <input type="hidden" class="form-control" name="name" value="guest">
      <input type="hidden" class="form-control" name="email" value={{$guestemail}}>
      <input type="hidden" class="form-control" name="password" value="password">
      <button id="guest" type="submit" class="btn-login btn-flat" href="">Guest</button>
      </div>
    </form>
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