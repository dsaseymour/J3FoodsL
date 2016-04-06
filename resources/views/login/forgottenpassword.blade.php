@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection

@section('content')

<!--one record below-->
{{$requestdesc['itemname_set'][1]}}
{{$requestdesc['optionname_set'][1]}}
{{$requestdesc['choicename_set'][1]}}
{{$requestdesc['specialinstruction_set'][1]}}
{{$requestdesc['orderquantity_set'][1]}}
{{$requestdesc['itemprice_set'][1]}}




<section id="forgotpassword-section">
<div class="container text-center" id="forgotpassword-container">
    <div class="row " id='forgotpassword-block'>

          <div class="col-md-5 panel panel-default col-centered " >
            <div class="panel-body">
                <div class="panel-header">
                    <h3>Reset Your Password</h3>
                </div>
                        <form action="#" method="post" role="form">
                            <h4>Enter Your Email: </h4>
                            <div class="input-group">
                              <span class="input-group-addon "><span class="glyphicon glyphicon-envelope"></span></span>
                              <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>

                </div><!-- panel body container -->
                <div class="panel-footer text-right">
                        <input type="submit" class="button button-block " name="resendemail" id="resendemail" value="Submit">
                        <input type="submit" class="button button-block " name="resendemail" id="resendemail" value="Cancel">
                </div>
                <input type="hidden" value="{{Session::token()}}" name="_token" />
                </form>
            </div>
</div> <!-- main row -->
</div>
</section>
@endsection
