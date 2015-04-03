<link rel="stylesheet" href="/eventboard/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css" />
@foreach($dayEvents as $event)
	<dl class="dl-horizontal">
				<dt>Title: </dt> <dd>{{ $event->title }}</dd>
				<dt>Organized by: </dt> <dd>{{ $event->organizerID }}</dd>
				<dt>From: </dt> <dd>{{ $event->startDate }}</dd>
				<dt>Until: </dt> <dd>{{ $event->endDate }}</dd>
	</dl>
	<a href="/eventboard/events/{{$event->id}}/edit" target="_self" class="btn btn-info">Edit event</a>
	{!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id]]) !!}
		<button type="submit" class="btn btn-danger btn-mini">Delete event</button>
	{!! Form::close() !!}
	<dl class="dl-horizontal">
				<dt>Description </dt> <dd>{{ $event->description }}</dd> <br>
			<br>
			<hr>
			<br>
	</dl>
@endforeach