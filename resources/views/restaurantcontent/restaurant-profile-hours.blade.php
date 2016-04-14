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
   <form action="" method="POST" role="form">
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
                  <th>
                     Closing Time
                  </th>
               </tr>
            </thead>
            <tbody>
               @for($i = 0; $i < count($dayNumbers); $i++)
               <tr>
                  <td>
                     {{$dayNames[$i]}}
                     <input name="{{$dayStrings[$i]}}" value={{$dayNumbers[$i]}} type="hidden"/>
                  </td>
                  <td>
                     <input name="{{$dayStrings[$i]}}_open" type="hidden" value="0"/>
                     <input name="{{$dayStrings[$i]}}_open" type="checkbox" value="1" class="form-control" id="ghours-misclosed" />
                  </td>
                  <td class="form-inline">
                     <select name="{{$dayStrings[$i]}}_open_time" class="form-control">
                        @include('includes.time-dropdown')
                     </select>
                     <select name="{{$dayStrings[$i]}}_open_XM" class="form-control">
                        <option value="0">AM</option>
                        <option value="12">PM</option>
                     </select>
                  </td>
                  <td class="form-inline">
                     <select name="{{$dayStrings[$i]}}_close_time" class="form-control">
                        @include('includes.time-dropdown')
                     </select>
                     <select name="{{$dayStrings[$i]}}_close_XM" class="form-control">
                        <option value="12">PM</option>
                        <option value="0">AM</option>
                     </select>
                  </td>
               </tr>
               @endfor
            </tbody>
            <!-- table body end-->
         </table>
      </div><!-- End table container -->

   </div>
   <div class="input-row row text-right" >
     <button type='submit'  class="btn  btn-primary"/>Reset Hours</button>
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
