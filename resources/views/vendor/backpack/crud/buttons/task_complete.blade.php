@if ($entry->is_completed === false)
<a href="{{ url($crud->route.'/edit/' . $entry->id  . '/taskcompleted') }} " class="btn btn-sm btn-link"><i class="fa fa-check-square pr-1"></i>Completed</a>  
@endif