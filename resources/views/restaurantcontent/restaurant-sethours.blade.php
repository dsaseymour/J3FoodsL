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
               <hr />
            </div>
            <div class="panel-body ">
               <form id="restaurant-signup-form" action="{{route('restaurantsethours')}}" accept-charset="utf-8" method="POST" role="form" >
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
                                 </td>
                                 <td>
                                    <input type="checkbox" class="form-control" id="ghours-misclosed" />
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
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
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="am">AM</option>
                                       <option value="pm">PM</option>
                                    </select>
                                 </td>
                                 <td class="form-inline">
                                    <select class="form-control">
                                       <option value="1:00">1:00</option>
                                       <option value="2:00">2:00</option>
                                       <option value="3:00">3:00</option>
                                       <option value="4:00">4:00</option>
                                       <option value="5:00">5:00</option>
                                       <option value="6:00">6:00</option>
                                       <option value="7:00">7:00</option>
                                       <option value="8:00">8:00</option>
                                       <option value="9:00">9:00</option>
                                       <option value="10:00">10:00</option>
                                       <option value="11:00">11:00</option>
                                       <option value="12:00">12:00</option>
                                    </select>
                                    <select class="form-control">
                                       <option value="pm">PM</option>
                                       <option value="am">AM</option>
                                    </select>
                                 </td>
                              </tr>
                           </tbody>
                           <!-- table body end-->
                        </table>
                        <input type="submit" class="btn btn-primary " name="sethours" id="sethours" value="Set Hours">
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