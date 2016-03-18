@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<div id="customer-overview-container" class="container ">
  <div class="row ">


    <div class="panel panel-default">

      <!-- Default panel contents -->
      <div class="panel-heading">
        <h1>Currently Open
        <span class="badge">10</span></h1>
       </div>


      <div class="panel-body">
        <h3>For More Information Click on a Restaurant Below</h3>
			@foreach ($restaurants as $rest)
				<div class="row">
                  <div class="col-sm-3 text-center">
                      <a href="{{ route('customermenuoverviewlink'  ) }}">
                          <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                      </a>
                      <h5>
                          <a href="#">{{$rest->name}}</a>
                      </h5>
                  </div>
			@endforeach
              <!--<div class="row">
                  <div class="col-sm-3 text-center">
                      <a href="{{ route('customermenuoverviewlink'  ) }}">
                          <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                      </a>
                      <h5>
                          <a href="#">Restaurant Name</a>
                      </h5>
                  </div>
                  
              <!-- /.row -->

             
            </div>
    </div>
  </div>
</div>
@endsection
