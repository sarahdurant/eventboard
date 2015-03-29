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
            <a href="/eventboard/home/{!! Carbon\Carbon::parse($date)->subMonth() !!}" class="btn btn-default">
                Previous Month
            </a>
            <a href="/eventboard/home/{!! Carbon\Carbon::parse($date)->addMonth() !!}" class="btn btn-default">
                Next Month
            </a>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12">
            <b>Events</b>
            @foreach($events as $event)
                <div class="row">
                    <div class="col-xs-12">
                        <h3>{{ $event->title }}</h3>
                        {{ $event->description }} <br>
                        {{ $event->startDate }} <br>
                        {{ $event->endDate }} <br>
                        {{ $event->organizerID }} <br>
                    </div>
                </div>
            @endforeach
		</div>
    </div>
</div>
@endsection
