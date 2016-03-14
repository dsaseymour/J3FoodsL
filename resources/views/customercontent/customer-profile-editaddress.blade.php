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
      <form action="/" method="POST" role="form">
          <div class="form-group">


                <!-- List group -->
                 <ul class="list-group">
                   <li class="list-group-item">
                         Duncan Street         <button type="button" class="close" data-dismiss="modal">&times;
<div class="row">
<div class="row">




</div>
<div class="row">




</div>



</div>


                         </button></li>
                   <li class="list-group-item">Tim Street         <button type="button" class="close" data-dismiss="modal">&times;</button></li>
                   <li class="list-group-item">Morbi leo risus         <button type="button" class="close" data-dismiss="modal">&times;</button></li>
                   <li class="list-group-item">Porta ac consectetur ac         <button type="button" class="close" data-dismiss="modal">&times;</button></li>
                   <li class="list-group-item">Vestibulum at eros         <button type="button" class="close" data-dismiss="modal">&times;</button></li>
                 </ul>


          </div>




      <div class="input-row row text-right" >
        <button type='submit'  class="btn  btn-primary   " /><span class="glyphicon glyphicon-plus"></span>New Address</button>
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

$("#cpcontent-addresses").addClass("active");

});
</script>
@endsection
