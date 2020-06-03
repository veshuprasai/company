@if(Session::has('msg'))
	<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif