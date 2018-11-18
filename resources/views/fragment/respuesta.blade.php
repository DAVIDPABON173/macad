@if(Session::has('info'))
	<div class="alert alert-info" align="center">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		{{ Session::get('info') }}
	</div>

@elseif(Session::has('success'))
	<div class="alert alert-primary" align="center">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		{{ Session::get('success') }}
	</div>

@elseif(Session::has('danger'))
	<div class="alert alert-danger" align="center">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		{{ Session::get('danger') }}
	</div>

@elseif(Session::has('warning'))
	<div class="alert alert-warning" align="center">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		{{ Session::get('warning') }}
	</div>
@endif






