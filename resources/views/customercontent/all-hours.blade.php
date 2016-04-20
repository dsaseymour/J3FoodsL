<?php
	function formatTime($time){
		return date("G:i", (new Datetime($time))->getTimestamp());
	}
?>
<tr><td>Sunday</td><td>{{formatTime($hours[6]->open_time)}}</td><td>{{formatTime($hours[6]->close_time)}}</td></tr>
<tr><td>Monday</td><td>{{formatTime($hours[0]->open_time)}}</td><td>{{formatTime($hours[0]->close_time)}}</td></tr>
<tr><td>Tuesday</td><td>{{formatTime($hours[1]->open_time)}}</td><td>{{formatTime($hours[1]->close_time)}}</td></tr>
<tr><td>Wednesday</td><td>{{formatTime($hours[2]->open_time)}}</td><td>{{formatTime($hours[2]->close_time)}}</td></tr>
<tr><td>Thursday</td><td>{{formatTime($hours[3]->open_time)}}</td><td>{{formatTime($hours[3]->close_time)}}</td></tr>
<tr><td>Friday</td><td>{{formatTime($hours[4]->open_time)}}</td><td>{{formatTime($hours[4]->close_time)}}</td></tr>
<tr><td>Saturday</td><td>{{formatTime($hours[5]->open_time)}}</td><td>{{formatTime($hours[5]->close_time)}}</td></tr>