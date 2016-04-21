@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection


@section("styles")
<style>

    /* New Styling */
   .window{
    top: 50px;
    margin-left:25%;
    width:50%;

}

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
  width:400px;
}

.btn-flat:hover {
  background-color: rgba(0,0,0,0.5);
}


h1 {
    padding-top: 2%;
    color: white;
    font-size: 65px;
    margin-left: 25%;
    max-width:50%;
    text-align:center;
}

/*.btn-customer{
    padding-top: 8%;
    padding-left: 10%;
    position: absolute;
}

.btn-restaurant{
    padding-left: 85%;
    padding-top: 8%;
    position: absolute;
}*/

p{

    color: white;
    font-size: 18px;
    margin-left: 10%;
    max-width:80%;
    text-align:center;
}

/*.btn-guest{
    width:10%;
    padding-left:40%;
    padding-top:3%;
}*/

.buttons-and-form{
    padding-top: 6%;
}

.btn-register-customer{
    padding-left: 7%;
    padding-top: 6%;
}

.btn-register-rest{
    padding-left: 5%;
    padding-top: 6%;
}

</style>
@endsection


@section('content')

<div class="image">

    <!--   <img src="http://imgur.com/eIz2pGr.jpg"/> -->

    <div class="header-textbox">
        <h1>Welcome to J3 Foods!</h1>
        <p>
            Are you hungry but don't want to leave the house? Here at J3 foods, we ensure that you can order delicious food right to your door!
        </p>
    </div>


<div class="row buttons-and-form">
    <div class="col-md-3 btn-register-customer">
        <a class="btn btn-primary " href="{{ route('registercustomer') }}">Register As Customer</a>
    </div>
    <div class="col-md-6 ">
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




                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 btn-register-rest">
       <a class="btn btn-primary " href="{{ route('registerrestaurant') }}">Register As Restaurant</a>
   </div>
</div>
</div>
</div>

</div>
@endsection
