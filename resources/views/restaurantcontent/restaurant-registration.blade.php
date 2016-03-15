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
            <div class="panel-header text-center">  <h1>Restaurant Sign Up</h1>
            <hr />
            </div>


            <div class="panel-body ">
            <form id="restaurant-signup-form" action="" accept-charset="utf-8" method="POST" role="form" >

                <div class=" row">
                    <div class="col-sm-6">
                        <input type="text" name="companyname" id="companyname" class="input-fieldformat form-control"  placeholder="Company Name" />
                    </div>
                </div>

                <div class="input-row row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="streetaddress" id="streetaddress"  class="input-fieldformat form-control" placeholder="Street Address"/>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" name="province" id="province" class="input-fieldformat form-control" placeholder="State/Province"/>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" name="country" id="country"  class="input-fieldformat form-control" placeholder="Country"/>
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col-sm-4">
                                <input type="text" name="city" id="city"  class="input-fieldformat form-control" placeholder="City"/>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" name="zipcode" id="zipcode"  class="input-fieldformat form-control" placeholder="Postal/ZipCode"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-row row" >
                    <div class="col-sm-6">
                        <input type="tel" name="phoneno" id="phoneno" class="input-fieldformat form-control"  placeholder="Phone Number"/>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email" class="input-fieldformat form-control"  placeholder="Email Address"/>
                    </div>
                </div>


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







                    <div id="deliveryop" class="input-row">
                        <div class="btn btn-default" data-toggle="collapse" data-target="#deliveryoption-info">Do You Deliver?</div>
                        <div id="deliveryoption-info" class="collapse input-row">

                            <div class="table-responsive"><!-- Start table container -->
                              <table class="table table-condensed table-hover table-bordered">
                                  <h4>Delivery Hours</h4>
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
                                          <input type="checkbox" class="form-control" id="delivhours-misclosed" />
                                     </td><!-- Closed-->

                                      <td>
                                      <input type="time" class="form-control" id="delivhours-mopen" />
                                      </td><!-- Open-->

                                      <td>

                                      </td>

                                      <td>
                                          <input type="time" class="form-control" id="delivhours-mopen" />
                                     </td><!-- Closing-->
                                    </tr>


                                    <tr>
                                        <td>
                                            Tuesday
                                        </td> <!-- Day-->

                                        <td>
                                            <input type="checkbox" class="form-control" id="delivhours-tisclosed" />
                                       </td><!-- Closed-->

                                        <td>
                                            <input type="time" class="form-control" id="delivhours-topen" />
                                        </td><!-- Open-->

                                        <td>

                                        </td>

                                        <td>
                                            <input type="time" class="form-control" id="delivhours-tclose" />
                                       </td><!-- Closing-->
                                      </tr>

                                      <tr>
                                          <td>
                                              Wednesday
                                          </td> <!-- Day-->

                                          <td>
                                              <input type="checkbox" class="form-control" id="delivhours-wisclosed" />
                                         </td><!-- Closed-->

                                          <td>
                                              <input type="time" class="form-control" id="delivhours-wopen" />
                                          </td><!-- Open-->

                                          <td>

                                          </td>

                                          <td>
                                              <input type="time" class="form-control" id="delivhours-wclose" />
                                         </td><!-- Closing-->
                                        </tr>

                                        <tr>
                                            <td>
                                                Thursday
                                            </td> <!-- Day-->

                                            <td>
                                                <input type="checkbox" class="form-control" id="delivhours-risclosed" />
                                           </td><!-- Closed-->

                                            <td>
                                                <input type="time" class="form-control" id="delivhours-ropen" />
                                            </td><!-- Open-->

                                            <td>

                                            </td>

                                            <td>
                                                <input type="time" class="form-control" id="delivhours-rclose" />
                                           </td><!-- Closing-->
                                          </tr>

                                          <tr>
                                              <td>
                                                  Friday
                                              </td> <!-- Day-->

                                              <td>
                                                  <input type="checkbox" class="form-control" id="delivhours-fisclosed" />
                                             </td><!-- Closed-->

                                              <td>
                                                  <input type="time" class="form-control" id="delivhours-fopen" />
                                              </td><!-- Open-->

                                              <td>

                                              </td>

                                              <td>
                                                  <input type="time" class="form-control" id="delivhours-fclose" />
                                             </td><!-- Closing-->
                                            </tr>

                                            <tr>
                                                <td>
                                                    Saturday
                                                </td> <!-- Day-->
                                                <td>
                                                <input type="checkbox" class="form-control" id="delivhours-satisclosed" />
                                               </td><!-- Closed-->

                                                <td>
                                                    <input type="time" class="form-control" id="delivhours-satopen" />
                                                </td><!-- Open-->

                                                <td>

                                                </td>

                                                <td>
                                                    <input type="time" class="form-control" id="delivhours-satclose" />
                                               </td><!-- Closing-->
                                              </tr>


                                              <tr>
                                                  <td>
                                                      Sunday
                                                  </td> <!-- Day-->

                                                  <td>
                                                      <input type="checkbox" class="form-control" id="delivhours-sunisclosed" />
                                                 </td><!-- Closed-->

                                                  <td>
                                                      <input type="time" class="form-control" id="delivhours-sunopen" />
                                                  </td><!-- Open-->

                                                  <td>

                                                  </td>

                                                  <td>
                                                      <input type="time" class="form-control" id="delivhours-sunclose" />
                                                 </td><!-- Closing-->
                                                </tr>

                              </tbody> <!-- table body end-->
                              </table>
                            </div><!-- End table container -->

                        </div>
                    </div>
                </div><!-- panel body container -->


                <div class="panel-footer ">
                <p class="disclaimer">By clicking Register, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Use Policy</a>, including our <a href="#">Cookie Use</a>.</p>
                <div class="text-right">
                    <input type="submit" class="button button-block " name="register" id="register" value="Register">
                </div>
            </div>
            </form>

</div>
</div> <!-- main row -->
</div>
</section>

@endsection
