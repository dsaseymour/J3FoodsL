@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection
@section('navigation')
@include('includes.topbar')
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
                                    <input name="mon" value="mon" type="hidden"/>
                                 </td>
                                 <td>
                                    <input name="mon_open" type="hidden" value="0"/>
                                    <input name="mon_open" type="checkbox" value="1" class="form-control" id="ghours-misclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="mon_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="mon_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select name="mon_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="mon_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Tuesday
                                    <input name="tue" value="tue" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="tue_open" type="hidden" value="0"/>
                                    <input name="tue_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="tue_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="tue_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select name="tue_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="tue_close_XM" class="form-control">
                                       <option value="0">PM</option>
                                       <option value="12">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Wednesday
                                    <input name="wed" value="wed" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="wed_open" type="hidden" value="0"/>
                                    <input name="wed_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="wed_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="wed_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select name="wed_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="wed_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Thursday
                                    <input name="thur" value="thur" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="thur_open" type="hidden" value="0"/>
                                    <input name="thur_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="thur_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="thur_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>                                 </td>
                                 <td class="form-inline">
                                    <select name="thur_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="thur_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Friday
                                    <input name="fri" value="fri" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="fri_open" type="hidden" value="0"/>
                                    <input name="fri_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="fri_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="fri_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                     <select name="fri_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="fri_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Saturday
                                    <input name="sat" value="sat" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="sat_open" type="hidden" value="0"/>
                                    <input name="sat_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="sat_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="sat_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select name="sat_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="sat_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Sunday
                                    <input name="sun" value="sun" type="hidden"/>
                                 </td>
                                 <!-- Day-->
                                 <td>
                                    <input name="sun_open" type="hidden" value="0"/>
                                    <input name="sun_open" value="1" type="checkbox" class="form-control" id="ghours-tisclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select name="sun_open_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="sun_open_XM" class="form-control">
                                       <option value="0">AM</option>
                                       <option value="12">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select name="sun_close_time" class="form-control">
                                       @include('includes.time-dropdown')
                                    </select>
                                    <select name="sun_close_XM" class="form-control">
                                       <option value="12">PM</option>
                                       <option value="0">AM</option>
                                    </select>
                                 </td>
                              </tr>
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