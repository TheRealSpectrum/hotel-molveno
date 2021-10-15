@if ($entry->is_clean === false)
<a href="{{ url($crud->route.'/edit/' . $entry->id  . '/clean') }} " class="btn btn-sm btn-link"><i class="fa fa-check-square pr-1"></i>Clean</a>  
@endif