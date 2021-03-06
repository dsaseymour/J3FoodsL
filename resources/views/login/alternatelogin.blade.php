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
      <div class="panel-header text-center">  <h1>Login</h1></div>
      <div class="panel-body">
        <form action="/" method="POST" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username:</label>
                <input type="text" class="form-control login-input" name="username" id="username" placeholder="Username"/>

                <label class="sr-only" for="password">Password:</label>
                <input type="password" class="form-control login-input" name="password" id="password" placeholder="Password"/>
              </div>
              <div id="forgotpass"><a href='#'>Forgot Password?</a> </div>
              <div id="loginsign-up">New to J3Foods?
                  <a href="#">Sign up</a>
              </div>


      </div>
        <div class="sign-up ">
        </div>
        <a href="#">
        <div  class="login-btn btn btn-lg btn-primary  center-block btn-block" />Log In</div>
        </a><!-- //:TODO a href is  only here for debugging until login starts working using php to redirect when pressing the login button to help debuggin -->

            </form>
    </div>
</div>
</div><!-- container --->
</div>
</div>
@endsection
