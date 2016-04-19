@if ($var == 'open')
<option value=1 >1:00</option>
<option @if($open_times[$i] == 2 || $open_times[$i] == 14) selected="selected"@endif value=2>2:00</option>
<option @if($open_times[$i] == 3 || $open_times[$i] == 15) selected="selected"@endif value=3>3:00</option>
<option @if($open_times[$i] == 4 || $open_times[$i] == 16) selected="selected"@endif value=4>4:00</option>
<option @if($open_times[$i] == 5 || $open_times[$i] == 17) selected="selected"@endif value=5>5:00</option>
<option @if($open_times[$i] == 6 || $open_times[$i] == 18) selected="selected"@endif value=6>6:00</option>
<option @if($open_times[$i] == 7 || $open_times[$i] == 19) selected="selected"@endif value=7>7:00</option>
<option @if($open_times[$i] == 8 || $open_times[$i] == 20) selected="selected"@endif value=8>8:00</option>
<option @if($open_times[$i] == 9 || $open_times[$i] == 21) selected="selected"@endif value=9>9:00</option>
<option @if($open_times[$i] == 10 || $open_times[$i] == 22) selected="selected"@endif value=10>10:00</option>
<option @if($open_times[$i] == 11 || $open_times[$i] == 23) selected="selected"@endif value=11>11:00</option>
<option @if($open_times[$i] == 0 || $open_times[$i] == 12) selected="selected"@endif value=0>12:00</option>
@elseif ($var == 'close')
<option value=1 >1:00</option>
<option @if($close_times[$i] == 2 || $close_times[$i] == 14) selected="selected"@endif value=2>2:00</option>
<option @if($close_times[$i] == 3 || $close_times[$i] == 15) selected="selected"@endif value=3>3:00</option>
<option @if($close_times[$i] == 4 || $close_times[$i] == 16) selected="selected"@endif value=4>4:00</option>
<option @if($close_times[$i] == 5 || $close_times[$i] == 17) selected="selected"@endif value=5>5:00</option>
<option @if($close_times[$i] == 6 || $close_times[$i] == 18) selected="selected"@endif value=6>6:00</option>
<option @if($close_times[$i] == 7 || $close_times[$i] == 19) selected="selected"@endif value=7>7:00</option>
<option @if($close_times[$i] == 8 || $close_times[$i] == 20) selected="selected"@endif value=8>8:00</option>
<option @if($close_times[$i] == 9 || $close_times[$i] == 21) selected="selected"@endif value=9>9:00</option>
<option @if($close_times[$i] == 10 || $close_times[$i] == 22) selected="selected"@endif value=10>10:00</option>
<option @if($close_times[$i] == 11 || $close_times[$i] == 23) selected="selected"@endif value=11>11:00</option>
<option @if($close_times[$i] == 0 || $close_times[$i] == 12) selected="selected"@endif value=0>12:00</option>
@else
<option value=1 >1:00</option>
<option value=2>2:00</option>
<option value=3>3:00</option>
<option value=4>4:00</option>
<option value=5>5:00</option>
<option value=6>6:00</option>
<option value=7>7:00</option>
<option value=8>8:00</option>
<option value=9>9:00</option>
<option value=10>10:00</option>
<option value=11>11:00</option>
<option value=0>12:00</option>
@endif

