@extends('layouts.emaillayout')
@section('title')
J3 Foods - Online Food Ordering
@endsection

Hi (User), we love feedback, could you take a moment to share your experience with (Restaurant)?
<br />
Please select an overall rating for (Restaurant):
<br />

<a href="{{ route('showfeedback') }}">5 Excellent
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{ route('showfeedback') }}">4 Good
<span  class="glyphicon glyphicon-star-empty"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
<span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{ route('showfeedback') }}">3 Fair
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{ route('showfeedback') }}">2 Poor
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{ route('showfeedback') }}">1 Awful
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star-empty"></span>
  <span  class="glyphicon glyphicon-star"></span>
</a>
<br />

<a href="{{ route('showfeedback') }}">Leave a Comment</a>
