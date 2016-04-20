<?php
	function formatTime($time){
		return date("G:i", (new Datetime($time))->getTimestamp());
	}
?>

<tr><td>Sunday</td><td>{{($hours[6]->open) ? formatTime($hours[6]->open_time) : "Closed"}}</td><td>{{($hours[6]->open) ? formatTime($hours[6]->close_time) : ""}}</td></tr>
<tr><td>Monday</td><td>{{($hours[0]->open) ? formatTime($hours[0]->open_time) : "Closed"}}</td><td>{{($hours[0]->open) ? formatTime($hours[0]->close_time) : ""}}</td></tr>
<tr><td>Tuesday</td><td>{{($hours[1]->open) ? formatTime($hours[1]->open_time) : "Closed"}}</td><td>{{($hours[1]->open) ? formatTime($hours[1]->close_time) : ""}}</td></tr>
<tr><td>Wednesday</td><td>{{($hours[2]->open) ? formatTime($hours[2]->open_time) : "Closed"}}</td><td>{{($hours[2]->open) ? formatTime($hours[2]->close_time) : ""}}</td></tr>
<tr><td>Thursday</td><td>{{($hours[3]->open) ? formatTime($hours[3]->open_time) : "Closed"}}</td><td>{{($hours[3]->open) ? formatTime($hours[3]->close_time) : ""}}</td></tr>
<tr><td>Friday</td><td>{{($hours[4]->open) ? formatTime($hours[4]->open_time) : "Closed"}}</td><td>{{($hours[4]->open) ? formatTime($hours[4]->close_time) : ""}}</td></tr>
<tr><td>Saturday</td><td>{{($hours[5]->open) ? formatTime($hours[5]->open_time) : "Closed"}}</td><td>{{($hours[5]->open) ? formatTime($hours[5]->close_time) : ""}}</td></tr>