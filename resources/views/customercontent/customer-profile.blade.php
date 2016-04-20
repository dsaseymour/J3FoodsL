@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')

<section id="profile-section">
	<div class="container text-center" id="profile-container" >
		<div class="row row-centered">
			<div class="col-sm-5 panel panel-default col-centered " id="profile-panel">
				<div class="panel-header center-block">
					@include('includes.customer-profilecontentbar')
				</div>
				<div class="panel-body">
					@if(session('status'))
					<div class="alert alert-success">
					  {{ session('status') }}
					</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ route('customerupdateinfo')    }}">
						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-0 control-label">Email:</label>
							<input type="text" class="form-control" name="email" id="email" value="{{$currentUser->email}}" />
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group">
							<label class="col-md-0 control-label">Name of Owner:</label>
							<input type="text" class="form-control" name="name" id="name"  value="{{$currentUser->name}}"/>
						</div>

						<div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}">
							<label class="col-md-0 control-label">Phone Number:</label>
							<input type="text" class="form-control" name="phoneno" id="phoneno"  value="{{$currentCustomer->phoneno}}"/>
							@if ($errors->has('phoneno'))
							<span class="help-block">
								<strong>{{ $errors->first('phoneno') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group">
							<label class="col-md-0 control-label">Address:</label>
							<input type="text" class="form-control" name="address" id="address"  value="{{$currentUser->address}}"/>
						</div>
						<div class="form-group">
							<label class="col-md-0 control-label">Resend My Verification Email:</label>
									<a href="{{ route('customerprofileresend')}}"><div class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span></div></a>
						</div>
						<div class="input-row row text-right" >
							<button type='submit' class="btn btn-primary"/>Save Changes</button>
						</div>



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

$("#cpcontent-profile").addClass("active");



});
</script>
@endsection
