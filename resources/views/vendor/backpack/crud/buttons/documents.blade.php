
@if ($entry->check_in_status && !$entry->check_out_status) 
<a href="{{ url($crud->route.'/documents/'.$entry->id)  }} "  class="btn btn-sm btn-link"><i class="las la-exclamation-circle"></i> Add Documents</a>  
@endif