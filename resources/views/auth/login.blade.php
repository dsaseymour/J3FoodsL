@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection

@section("styles")
<style>

/* New Styling */


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
  /* background-position-y:45%;*/
 }

 .window{
    top: 50px;
    margin-left:25%;
    width:50%;

 }

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
  width:400px;
}

.btn-flat:hover {
  background-color: rgba(0,0,0,0.5);
}


h1 {
    padding-top: 2%;
    color: white;
    font-size: 70px;
    margin-left: 25%;
    max-width:700px;
    text-align:center;
}

.btn-customer{
    margin-right:13%;
}

p{
   
    color: white;
    font-size: 24px;
    margin-left: 10%;
    max-width:80%;
    text-align:center;
}

</style>
@endsection


@section('content')

<div class="container image">

<!--   <img src="http://imgur.com/eIz2pGr.jpg"/> -->
  
  <div class="header-textbox">
    <h1>Welcome to J3 Foods!</h1>
  </div>

  
    <p>
        Are you  hungry but don't want to leave the house? Here at J3 foods, we ensure that you can order delicious food right to your door! oods, we ensure that you can order delicious food right to your door!oods, we ensure that you can order d
    </p>
  <p id="guest">
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
  </p>



    <div class="row">
        <div class="col-md-8 col-md-offset-2 window">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <!-- WE NEED THIS ACTION TO BE WORKING-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i><span>Login</span>
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class=" col-md-offset-2">
                                <a class="btn btn-primary btn-customer" href="{{ route('registercustomer') }}">Register As Customer</a>
                                <a class="btn btn-primary" href="{{ route('registerrestaurant') }}">Register As Restaurant</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
