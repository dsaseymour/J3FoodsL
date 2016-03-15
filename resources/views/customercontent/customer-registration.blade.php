@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<section id="registration-section">
<div class="container-fluid text-center" id="customer-registration-container">
    <div class="row " id='customer-registration-block'>
          <div class="col-md-5 panel panel-default col-centered " id="login-panel">
            <div class="panel-header text-center">  <h1>Customer Sign Up</h1></div>



            <div class="panel-body">
            <form id="customer-signup-form" action="" accept-charset="utf-8" method="POST" role="form" >

                <div class="input-row row">
                    <div class="col-sm-6">
                        <input type="text" name="firstname" id="firstname" class="input-fieldformat form-control"  placeholder="Your first name" />
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="lastname" id="lastname" class="input-fieldformat form-control"  placeholder="Your last name"/>
                    </div>
                </div>

                <div class="input-row row" >
                    <div class="col-sm-6">
                        <input type="text" name="phoneno" id="phoneno" class="input-fieldformat form-control"  placeholder="Phone Number"/>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="email" id="email" class="input-fieldformat form-control"  placeholder="Email Address"/>
                    </div>
                </div>

                    <div id="initial-addressop" class="input-row">

                        <div class="btn btn-default" data-toggle="collapse" data-target="#inaddressinfo">Do You Want to Provide an Initial Address?</div>

                        <div id="inaddressinfo" class="collapse input-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="streetaddress" id="streetaddress"  class="input-fieldformat form-control" placeholder="Street Address"/>
                                </div>

                                <div class="col-sm-4">
                                    <input type="text" name="province" id="province" class="input-fieldformat form-control" placeholder="State/Province"/>
                                </div>

                                <div class="col-sm-4">
                                    <input type="text" name="country" id="country"  class="input-fieldformat form-control" placeholder="Country"/>
                                </div>
                            </div>

                            <div class="input-row row">
                                <div class="col-sm-4">
                                    <input type="text" name="city" id="city"  class="input-fieldformat form-control" placeholder="City"/>
                                </div>

                                <div class="col-sm-4">
                                    <input type="text" name="zipcode" id="zipcode"  class="input-fieldformat form-control" placeholder="Postal/ZipCode"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- panel body container -->



                <div class="panel-footer ">
                <p class="disclaimer">By clicking Register, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Use Policy</a>, including our <a href="#">Cookie Use</a>.</p>
                <div class="text-right">
                    <input type="submit" class="button button-block " name="register" id="register" value="Register">
                </div>
            </div>
            </form>

</div>
</div> <!-- main row -->
</div>
</section>
@endsection
