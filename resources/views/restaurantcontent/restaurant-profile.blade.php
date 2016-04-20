@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.restaurant-topbar')
@endsection


@section('content')
<section id="profile-section">
  <div class="container text-center" id="profile-container" >
    <div class="row row-centered">
      <div class="col-sm-5 panel panel-default col-centered " id="profile-panel">
        <div class="panel-header center-block">
          @include('includes.restaurant-profilecontentbar')
        </div>
  <div class="panel-body">
    @if(session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
    <!-- Do I need something in the action? Seems to update the db without it-->
    <form id="restaurant-signup-form" action="" accept-charset="utf-8" method="POST" role="form" >
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">Email</label>
          <input type="text" name="email" class="input-fieldformat form-control"  value="{{$currentUser->email}}" />
          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">Name</label>
          <input type="text" name="name" class="input-fieldformat form-control"  value="{{$currentUser->name}}" />
          @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}" >
          <label class="col-md-6 control-label">Company Name</label>
          <input type="text" name="companyname" class="input-fieldformat form-control"  value="{{$currentRestaurant->companyname}}" />
          @if ($errors->has('companyname'))
            <span class="help-block">
                <strong>{{ $errors->first('companyname') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">Address</label>
          <input type="text" name="address"  class="input-fieldformat form-control" value="{{$currentRestaurant->address}}"/>
          @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">Province</label>
          <input type="text" name="province" class="input-fieldformat form-control" value="{{$currentRestaurant->province}}"/>
          @if ($errors->has('province'))
            <span class="help-block">
                <strong>{{ $errors->first('province') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">City</label>
          <input type="text" name="city"  class="input-fieldformat form-control" value="{{$currentRestaurant->city}}"/>
          @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('postalcode') ? ' has-error' : '' }}" >
          <label class="col-md-4 control-label">Postal Code</label>
          <input type="text" name="postalcode"  class="input-fieldformat form-control" value="{{$currentRestaurant->postalcode}}"/>
          @if ($errors->has('postalcode'))
            <span class="help-block">
                <strong>{{ $errors->first('postalcode') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}" >
          <label class="col-md-6 control-label">Phone Number</label>
          <input type="tel" name="phoneno" class="input-fieldformat form-control"  value="{{$currentRestaurant->phoneno}}"/>
          @if ($errors->has('phoneno'))
            <span class="help-block">
                <strong>{{ $errors->first('phoneno') }}</strong>
            </span>
          @endif
        </div>
        <label class="col-md-6 control-label">Image URL</label>
        <input type="text" name="image" class="input-fieldformat form-control"  value="{{$currentRestaurant->image}}" />

        <div class="form-group input-row ">
            <label class="col-md-0 control-label">Resend My Verification Email:</label>
                <a href="{{ route('restaurantprofileresend')}}"><div class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span></div></a>
          </div>

        <div class="input-row row text-right" >
          <button type='submit' class="btn  btn-primary"/>Save Changes</button>
        </div>
        </div><!-- panel body container -->

        <input type="hidden" value="{{Session::token()}}" name="_token" />
    </form>
      </div>
  </div>
  </div><!-- container --->
</div>
</div>
</section>
@endsection


@section('javascript')
<script>
$(function() {
$("#rpcontent-settings").addClass("active");
});
</script>
@endsection
