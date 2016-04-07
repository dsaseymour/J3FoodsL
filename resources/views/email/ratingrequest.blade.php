Hi {{$customer['name']}}, we love feedback, could you take a moment to share your experience with {{$restaurant['companyname']}} ?
<br />
Please select an overall rating:
<br />


<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">5 Excellent
<img src="http://i.imgur.com/Jdybrfn.gif" alt="" height="12" width="64">
</a>
<br />

<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">4 Good
<img src="http://i.imgur.com/Lb7pFYd.gif" alt="" height="12" width="64">
</a>
<br />

<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">3 Fair
<img src="http://i.imgur.com/Ijl1tSm.gif" alt="" height="12" width="64">
</a>
<br />

<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">2 Poor
<img src="http://i.imgur.com/43SEfZR.gif" alt="" height="12" width="64">
</a>
<br />

<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">1 Awful
<img src="http://i.imgur.com/vKpPe86.gif" alt="" height="12" width="64">
</a>
<br />
<br />
<br />
<a href="{{URL::to('/feedback/'.$order['restaurant_id'])}}">Leave a Comment</a>
