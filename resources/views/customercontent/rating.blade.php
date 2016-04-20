<?php
	//Creates the star rating for restaurants, given a $rating
	//This is really gross, but it's considerably faster than using a for loop for some reason
	//It takes up too much space though, which is why it's in a separate file
?>
@if($rating >= 1)
	<i class="material-icons">star</i>
@endif
@if($rating >= 2)
	<i class="material-icons">star</i>
@endif
@if($rating >= 3)
	<i class="material-icons">star</i>
@endif
@if($rating >= 4)
	<i class="material-icons">star</i>
@endif
@if($rating == 5)
	<i class="material-icons">star</i>
@endif
@if(floor($rating) != ceil($rating))
	<i class="material-icons">star_half</i>
@endif
@if($rating <= 4)
	<i class="material-icons">star_border</i>
@endif
@if($rating <= 3)
	<i class="material-icons">star_border</i>
@endif
@if($rating <= 2)
	<i class="material-icons">star_border</i>
@endif
@if($rating <= 1)
	<i class="material-icons">star_border</i>
@endif
@if($rating == 0)
	<i class="material-icons">star_border</i>
@endif