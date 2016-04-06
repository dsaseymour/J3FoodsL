<div id="orderdropdown" class="collapse width">

    <div class="row"> <!-- start of row -->
      @foreach($completeorders as $currentitem)
      @if($currentitem->item_id==$id)
      <div class="list-group">
        <div class="col-sm-3 menu-items">
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">{{$currentitem->item->name}}</h4>
              <p class="list-group-item-text">
            garlic Sauce<br />
              supersauce</p>
            </a>
        </div>
      </div>
    @endif
    @endforeach
    </div> <!-- end of row -->

</div><!-- main div -->