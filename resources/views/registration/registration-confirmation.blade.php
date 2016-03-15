@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<section id="registration-section">
<div class="container text-center" id="registrationconfirmation-container">
    <div class="row " id='registrationconfirmation-block'>

          <div class="col-md-5 panel panel-default col-centered " >
            <div class="panel-header text-center">  <h1>Almost There!</h1></div>
            <div class="panel-body">
                <form action="#" method="post" role="form">

                        <h4>Thanks for signing up to J3Foods!</h4>
                        <p><span class="glyphicon glyphicon-envelope"></span>
                            We just sent you a confirmation email.<br />
                            Go to youremail@gmail.com to complete the sign-up process.
                        </p>
                        <div class="text-right">
                            <input type="submit" class="button button-block " name="resendemail" id="resendemail" value="Resend Email">
                        </div>
                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                        </form>
                </div><!-- panel body container -->
            </div>
</div> <!-- main row -->
</div>
</section>
@endsection
