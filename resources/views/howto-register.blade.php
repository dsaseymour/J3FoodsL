@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection

<style>
  .instructions{
    list-style: decimal inside;
    padding-left: 2%;
  }
</style>
@section('content')
<div class="col-md-4 col-md-offset-2">
  <div class="row">
    <h1 id="lpinfo-heading"><u>Register as a Customer</u></h1>
    <ol class="instructions">
      <li><p>From the homepage click the blue customer button. This will bring you to the customer login page.<br> <img src="http://i63.tinypic.com/2mrb6n4.png" border="0"></p></li>
      <br>
      <li>Once you are at the login page, click on the blue register buttons. This will bring up the registration fields.<br><img src="http://i65.tinypic.com/27yoifn.png" border="0"></li>
      <br>
      <li>Fill out each of the 4 fields: your name, your email, password, and password comfirmation. Then click the register button at the bottom of the form.<br><img src="http://i66.tinypic.com/b3pufs.png" border="0" alt="Image and video hosting by TinyPic"></li>
      <br>
      <li>This will automatically log you in as a customer. From there you can explore our website. Or for more information click on the person picture in the top right corner and select 'Help'.<br><img src="http://i65.tinypic.com/71p5k8.png" border="0"></li>
    </ol>
  </div>
  <div class="row" id="lpinfo">
    <h1 id="lpinfo-heading"><u>Enter as a Guest</u></h1>
    <ol class="instructions">
      <li><p>From the homepage click the blue customer button. This will bring you to the customer login page.<br> <img src="http://i63.tinypic.com/2mrb6n4.png" border="0"></p></li>
      <br>
      <li>Once you are at the login page, click on the 'Enter as a Guest' text.<br><img src="http://i65.tinypic.com/2rpvi28.png" border="0"></li>
    </ol>
  </div>
  <div class="row" id="lpinfo">
    <h1 id="lpinfo-heading"><u>Register a Restaurant</u></h1>
    <ol class="instructions">
      <li><p>From the homepage click the blue restaurant button. This will bring you to the customer login page.<br><img src="http://i67.tinypic.com/2iwayk0.png" border="0" ></p></li>
      <br>
      <li>Once you are at the login page, click on the blue register buttons. This will bring up the registration fields.<br><img src="http://i65.tinypic.com/27yoifn.png" border="0"></li>
      <br>
      <li>Fill out each each of the fields. Then click the register button at the bottom of the form.<br><img src="http://i63.tinypic.com/8zi7fn.jpg" ></li>
      <br>
      <li>This will automatically log you in as a restaurant. From there you can explore our website. Or for more information click on the person picture in the top right corner and select 'Help'.<br><img src="http://i65.tinypic.com/71p5k8.png" border="0"></li>
    </ol>
    <br><br><br>
  </div>
</div>

</div>
@endsection
