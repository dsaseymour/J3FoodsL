@extends('layouts.emaillayout')
@section('title')
J3 Foods - Online Food Ordering
@endsection

Hi (User), we love feedback, could you take a moment to share your experience with (Restaurant)?
<br />
Please select an overall rating for (Restaurant):
<br />

$rest_id= $event->order->restaurant_id;

<a href="{{URL::to('/feedback/'. $rest_id)}}">5 Excellent
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
</a>
<br />


<a href="{{URL::to('/feedback/'. $rest_id)}}">4 Good
<span  class="glyphicon glyphicon-star-empty"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{URL::to('/feedback/'. $rest_id)}}">3 Fair
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{URL::to('/feedback/'. $rest_id)}}">2 Poor
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{URL::to('/feedback/'. $rest_id)}}">1 Awful
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{URL::to('/feedback/'. $rest_id)}}">Leave a Comment</a>
