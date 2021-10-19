@if ($entry->check_out_status)
<a class="btn btn-sm btn-link"><i class="fas fa-calendar-check"></i> Completed</a>    
@elseif ($entry->check_in_status)
<a href="{{ url($crud->route.'/checkinout/'.$entry->id)  }} " class="btn btn-sm btn-link"><i class="fa fa-check-square"></i> Check Out</a>   
@else    
@if (\Carbon\Carbon::parse($entry->check_in)->isToday())
<a href="{{ url($crud->route.'/checkinout/'.$entry->id)  }} " class="btn btn-sm btn-link"><i class="far fa-square"></i> Check In</a>  
@endif
@endif
