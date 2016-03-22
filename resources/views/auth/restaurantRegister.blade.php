@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Restaurant Register</div>
                <div class="panel-body">
                <!--{{ url('/validcustomerlogin') }}-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('testing') ? ' has-error' : '' }}""  >
                            <label class="col-md-4 control-label">testing</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="testing" value="{{ old('testing') }}">
								@if ($errors->has('testing'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('testing') }}</strong>
                                    </span>
                                @endif
                                
                   
                               
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="companyname" value="{{ old('companyname') }}">
								@if ($errors->has('companyname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyname') }}</strong>
                                    </span>
                                @endif  
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif   
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">Province</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="province" value="{{ old('province') }}">
                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                   
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('postalcode') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">Postal Code</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}">
                                @if ($errors->has('postalcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}"  >
                            <label class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phoneno" value="{{ old('phoneno') }}">
                                @if ($errors->has('phoneno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneno') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                <div class="input-row row">
                    <div class="col-sm-12">
                    </div>
                </div>

                        
                        <input type="hidden" class="form-control" name="isRestaurant" value="1">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                                
								<!--<a href="{{ route('registerrestaurantinfo'  ) }}">Continue</a>-->
                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
