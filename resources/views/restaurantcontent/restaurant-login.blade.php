@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<div class="container text-center" id="login-container" >
  <div class="row row-centered">
    <div class="col-sm-5 panel panel-default col-centered " id="login-panel">
      <div class="panel-header text-center">  <h1>Restaurant Login</h1></div>
      <div class="panel-body">
        <form action="{{ route('restaurantlogin') }}" method="POST" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>

                <label class="sr-only" for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
              </div>

              <div id="forgotpass"><a href="{{ route('passwordreset') }}">Forgot Password?</a> </div>
              <div id="loginsign-up">New to J3Foods?
                  <a href="{{ route('restaurantregisterlink'  ) }}">Sign up</a>
              </div>


      </div>
        <div class="sign-up ">
        </div>
        <button  class="login-btn btn btn-lg btn-primary  center-block btn-block" type="submit" />Log In</button>

        {{ csrf_field() }}
        </form>
    </div>
</div>
</div><!-- container --->
</div>
</div>
@endsection
