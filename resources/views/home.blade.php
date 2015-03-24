@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Calendar goes here!
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			{!! dd($events) !!}
		</div>
	</div>
</div>
@endsection
