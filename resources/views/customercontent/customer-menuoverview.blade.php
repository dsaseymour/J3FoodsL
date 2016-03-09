@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<div class="container">
  <div id="restaurant-hdrcontainer" >
  <div class="row">
              <div id="rhdr-left" class="col-sm-3">
              <img src="../../images/logoplaceholder.PNG" />
              </div>
              <div id="rhdr-center" class="col-sm-6 text-center">
                                      <div id="avgrating">
                                                  <span id="avgrating-emptystar" class="glyphicon glyphicon-star-empty"></span>
                                                  <span id="avgrating-star" class="glyphicon glyphicon-star"></span>
                                      </div>
              </div>
              <div id="rhdr-right" class="col-sm-3">
                        <a data-toggle="collapse" data-target="#shopping-cart"><span class="glyphicon glyphicon-shopping-cart" id="rhdr-shoppingicon"  data-toggle="tooltip" title="Click to show Shopping Cart"></span></a> <?php //TODO: add a popover to explain what the button does clicking activates a popoutmenu  ?>
                                      <div id="rhdr-info">
                                      <p>
                                      <span class="glyphicon glyphicon-map-marker"></span> Tim Street
                                      </p>

                                      <p>
                                                  <span class="glyphicon glyphicon-earphone"></span> 905-356-6899
                                      </p>

                                      <p>
                                      <span class="glyphicon glyphicon-envelope"></span> burgergrill@gmail.com
                                      </p>

                                      <p>
                                                  <span class="glyphicon glyphicon-globe"></span> www.burgergrill.com
                                      </p>
                                      </div>


              </div>
  </div>
  </div>
  <hr />




  <div id="menu-specials-container" class="row">
  <h1>Specials</h1>

  <div class="row"> <!-- start of row -->
    <div class="col-sm-4 menu-items">
      <a href="http://www.msn.com/en-ca/">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>

    <div class="col-sm-4 menu-items">
      <a href="http://www.msn.com/en-ca/">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>


    <div class="col-sm-4 menu-items">
      <a href="http://www.msn.com/en-ca/">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>
  </div> <!-- end of row -->

  </div>
  <hr />

  <div id="menu-appetizers-container" >
    <h1>Appetizers</h1>
  <div class="row"> <!-- start of row -->
  <div class="col-sm-3 menu-items">
    <a href="http://www.msn.com/en-ca/">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>

  <div class="col-sm-3 menu-items">
    <a href="http://www.msn.com/en-ca/">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>


  <div class="col-sm-3 menu-items">
    <a href="http://www.msn.com/en-ca/">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>


  <div class="col-sm-3 menu-items">
    <a href="http://www.msn.com/en-ca/">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>

  </div> <!-- end of row -->


  </div>
  <hr />

  <div id="menu-mains-container" class="row">
    <h1>Mains</h1>

    <div class="row"> <!-- start of row -->
      <div class="col-sm-3 menu-items">
        <a href="http://www.msn.com/en-ca/">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>

      <div class="col-sm-3 menu-items">
        <a href="http://www.msn.com/en-ca/">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>


      <div class="col-sm-3 menu-items">
        <a href="http://www.msn.com/en-ca/">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>


      <div class="col-sm-3 menu-items">
        <a href="http://www.msn.com/en-ca/">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>

    </div> <!-- end of row -->
  </div>
  <hr />

  <div class="btn btn-default btn-lg" data-toggle="modal" data-target="#item-subscreen">Item SubScreen</div>

  <!-- Modal -->
  <div id="item-subscreen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Order Successfully Processed</p>
        </div>
        <div class="modal-footer">
          <a href="{{ route('customermenuoverviewlink'  ) }}"><button type="button" class="btn btn-default" >Return</button></a>
        </div>
      </div>
    </div>
  </div>




</div>
@include('includes.shoppingcart')

@endsection
