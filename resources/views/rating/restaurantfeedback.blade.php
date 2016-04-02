@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<section id="feedback-section">
  <div class="container text-center" >
    <div class="row ">
      <div class="panel panel-default" id="profile-panel">
        <div class="panel-header">
          <div id="feedback-contentbar " >
            <div class="row">
            <ul class="nav nav-pills">
              <li class="nav-item" id="feedback-content">
                <a class="nav-link" href="#">Rate Your Experience </a>
              </li>
            </ul>
          </div>
          </div>
        </div>


  <div class="panel-body">
      <form action="{{route('submitfeedback')}}" method="POST" role="form">
          <div class="form-group">
            <label for="comment">Rating:</label>
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Excellent - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Pretty Fair - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Fair - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Poor - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Pretty Poor - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="Awful" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Pretty Awful - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Terrible - 0.5 stars"></label>
            </fieldset>
          </div>

          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
          </div>



      <div class="input-row row text-right" >
        <button type='submit'  class="btn  btn-primary   " />Submit Feedback</button>
      </div>


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
$("#feedback-content").addClass("active");
});
</script>
@endsection
