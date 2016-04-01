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
      <form action="/" method="POST" role="form">
        <div class="input-row row" >
            <div class="table-responsive"><!-- Start table container -->
                        <table class="table table-condensed table-hover table-bordered">
                           <thead>
                              <tr>
                                 <th>
                                    Day
                                 </th>
                                 <!-- Day-->
                                 <th>
                                    Open
                                 </th>
                                 <!-- Closed-->
                                 <th>
                                    Opening Time
                                 </th>
                                 <!-- Open-->
                                 <th>
                                    Closing Time
                                 </th>
                                 <!-- Closing-->
                              </tr>
                           </thead>
                           <tbody>
                              <!-- table body start-->
                              <tr>
                                 <td>
                                    Monday
                                 </td>
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-misclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Tuesday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Wednesday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-wisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Thursday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-risclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Friday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-fisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Saturday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-satisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Sunday
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-sunisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                                 <td class="form-inline">
                                    @include('includes.time-dropdown')
                                 </td>
                              </tr>
                           </tbody>
                           <!-- table body end-->
                        </table>
            </div><!-- End table container -->

        </div>
        <div class="input-row row text-right" >
          <button type='submit'  class="btn  btn-primary   " />Save Changes</button>
        </div>


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

$("#rpcontent-hours").addClass("active");



});
</script>
@endsection
