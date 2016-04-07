@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection
@section('navigation')
@include('includes.restaurant-topbar')
@endsection
@section('content')
<section id="registration-section">
   <div class="container-fluid text-center" id="restaurant-registration-container">
      <div class="row " id='restaurant-registration-block'>
         <div class="col-md-5 panel panel-default col-centered " id="login-panel">
            <div class="panel-header text-center">
               <h1>Hours of Operations</h1>
               <hr/>
            </div>
            <div class="panel-body ">
               <form id="restaurant-signup-form" action="" accept-charset="utf-8" method="POST" role="form" >
                  {{ csrf_field() }}
                  <div class="input-row row" >
                     <div class="table-responsive">
                        <!-- Start table container -->
                        <table class="table table-condensed table-hover table-bordered">
                           <thead>
                              <tr>
                                 <th>
                                    Day
                                 </th>
                                 <th>
                                    Open
                                 </th>
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
                        <input type="submit" class="btn btn-primary pull-right" name="sethours" id="sethours" value="Set Hours">
                     </div>
                     <!-- End table container -->
                  </div>
               </div>
               <!-- panel body container -->
            </div>
         </form>
      </div>
   </div>
   <!-- main row -->
</div>
</section>
@endsection