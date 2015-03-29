@extends('app')
@section('content')
<style>
.generalEvent {
	background-color: red;
}
.organizerEvent {
	background-color: blue;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<!-- Responsive calendar - START -->
					<div class="responsive-calendar">
						<div class="controls">
								<a class="pull-left" data-go="prev"><div class="btn"><i class="icon-chevron-left"></i></div></a>
								<h4><span data-head-year></span> <span data-head-month></span></h4>
								<a class="pull-right" data-go="next"><div class="btn"><i class="icon-chevron-right"></i></div></a>
						</div><hr/>
						<div class="day-headers">
							<div class="day header">Mon</div>
							<div class="day header">Tue</div>
							<div class="day header">Wed</div>
							<div class="day header">Thu</div>
							<div class="day header">Fri</div>
							<div class="day header">Sat</div>
							<div class="day header">Sun</div>
						</div>
						<div class="days" data-group="days">
							<!-- the place where days will be generated -->
						</div>
					</div>
					<!-- Responsive calendar - END -->
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
            <b>Events</b> {{ $dt->format('Y-m') }}
            @foreach($events as $event)
                <div class="row">
                    <div class="col-xs-12">
                        <h3>{{ $event->title }}</h3>
												{{ $event->id }}
                        {{ $event->description }} <br>
                        {{ Carbon\Carbon::parse($event->startDate)->format('Y-m-d') }} <br>
                        {{ $event->endDate }} <br>
                        {{ $event->organizerID }} <br>
                    </div>
                </div>
            @endforeach
		</div>
    </div>
</div>
<script src="/eventboard/js/responsive-calendar.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          time: '{{ $dt->format('Y-m') }}',
          events: {
						@foreach($events as $event)
            	"{{Carbon\Carbon::parse($event->startDate)->format('Y-m-d')}}": 
								{ "number": {{ $event->id }}, 
									"url": "/eventboard/events/{{ $event->id }}",
									"title": "{{ $event->title }}",
									"startTime": "{{ $event->startDate }}",
									"endTime": "{{ $event->endDate }}",
									@if ($event->organizerID == Auth::id())
										"class": "organizerEvent"
									@else
										"class": "generalEvent"
									@endif		
								},
 						@endforeach
					}
        });
      });
    </script>
@endsection
