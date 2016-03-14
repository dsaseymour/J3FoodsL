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
                  <h4>Hours of Operation</h4>
                <thead>
                  <tr>
                    <th>
                        Day
                    </th> <!-- Day-->

                    <th>
                    Closed?
                   </th><!-- Closed-->

                    <th>
                    Opening
                    </th><!-- Open-->

                    <th>

                    </th>

                    <th>
                    Closing
                   </th><!-- Closing-->
                  </tr>
                </thead>

                <tbody> <!-- table body start-->

                  <tr>
                      <td>
                          Monday
                      </td> <!-- Day-->

                      <td>
                          <input type="checkbox" class="form-control" id="ghours-misclosed" />
                     </td><!-- Closed-->

                      <td>
                      <input type="time" class="form-control" id="ghours-mopen" />
                      </td><!-- Open-->

                      <td>

                      </td>

                      <td>
                          <input type="time" class="form-control" id="ghours-mopen" />
                     </td><!-- Closing-->
                    </tr>


                    <tr>
                        <td>
                            Tuesday
                        </td> <!-- Day-->

                        <td>
                            <input type="checkbox" class="form-control" id="ghours-tisclosed" />
                       </td><!-- Closed-->

                        <td>
                            <input type="time" class="form-control" id="ghours-topen" />
                        </td><!-- Open-->

                        <td>

                        </td>

                        <td>
                            <input type="time" class="form-control" id="ghours-tclose" />
                       </td><!-- Closing-->
                      </tr>

                      <tr>
                          <td>
                              Wednesday
                          </td> <!-- Day-->

                          <td>
                              <input type="checkbox" class="form-control" id="ghours-wisclosed" />
                         </td><!-- Closed-->

                          <td>
                              <input type="time" class="form-control" id="ghours-wopen" />
                          </td><!-- Open-->

                          <td>

                          </td>

                          <td>
                              <input type="time" class="form-control" id="ghours-wclose" />
                         </td><!-- Closing-->
                        </tr>

                        <tr>
                            <td>
                                Thursday
                            </td> <!-- Day-->

                            <td>
                                <input type="checkbox" class="form-control" id="ghours-risclosed" />
                           </td><!-- Closed-->

                            <td>
                                <input type="time" class="form-control" id="ghours-ropen" />
                            </td><!-- Open-->

                            <td>

                            </td>

                            <td>
                                <input type="time" class="form-control" id="ghours-rclose" />
                           </td><!-- Closing-->
                          </tr>

                          <tr>
                              <td>
                                  Friday
                              </td> <!-- Day-->

                              <td>
                                  <input type="checkbox" class="form-control" id="ghours-fisclosed" />
                             </td><!-- Closed-->

                              <td>
                                  <input type="time" class="form-control" id="ghours-fopen" />
                              </td><!-- Open-->

                              <td>

                              </td>

                              <td>
                                  <input type="time" class="form-control" id="ghours-fclose" />
                             </td><!-- Closing-->
                            </tr>

                            <tr>
                                <td>
                                    Saturday
                                </td> <!-- Day-->
                                <td>
                                <input type="checkbox" class="form-control" id="ghours-satisclosed" />
                               </td><!-- Closed-->

                                <td>
                                    <input type="time" class="form-control" id="ghours-satopen" />
                                </td><!-- Open-->

                                <td>

                                </td>

                                <td>
                                    <input type="time" class="form-control" id="ghours-satclose" />
                               </td><!-- Closing-->
                              </tr>


                              <tr>
                                  <td>
                                      Sunday
                                  </td> <!-- Day-->

                                  <td>
                                      <input type="checkbox" class="form-control" id="ghours-sunisclosed" />
                                 </td><!-- Closed-->

                                  <td>
                                      <input type="time" class="form-control" id="ghours-sunopen" />
                                  </td><!-- Open-->

                                  <td>

                                  </td>

                                  <td>
                                      <input type="time" class="form-control" id="ghours-sunclose" />
                                 </td><!-- Closing-->
                                </tr>

              </tbody> <!-- table body end-->
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
