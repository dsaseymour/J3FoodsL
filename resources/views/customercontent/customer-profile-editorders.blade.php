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


          </div>


      <div class="input-row row text-right" >
        <button type='submit'  class="btn  btn-primary   " />Save Changes</button>
      </div>
          </form>
      </div> <!-- panel body end -->
  </div>
  </div><!-- container --->
</div>
</div>
</section>
@endsection


@section('javascript')
<script>
$(function() {

      $("#cpcontent-history").addClass("active");



});
</script>
@endsection
