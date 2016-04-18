@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection



@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<div class="container-fluid" id="landingpage-container">
<div class="row" id="lpinfo">
    <h1 id="lpinfo-heading">Why use J3 Foods?</h1>
    <div class="col-md-6 col-md-offset-3">
      <div class="card card-block">
        <p class="card-text">Are you  hungry but don't want to leave the house? Here at J3 foods, we ensure that you can order delicious food right to your door!</p>
      </div>
    </div>
  </div>
  <div class="row">
        <div class="col-md-12 text-center" id="lpgreet">
			<div class="row">
				<div >
					<a href= "{{ route('logincust')    }}"> <button type="button" class="button btn-lg" id="landinglogin-cus" >Enter</button> </a>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
