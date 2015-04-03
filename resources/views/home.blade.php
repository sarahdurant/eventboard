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
</div>




<script type="text/javascript">


	$(document).ready(function () {
		function addLeadingZero(num) {
			if (num < 10) {
				return "0" + num;
			} else {
				return "" + num;
			}
		}
		$(".responsive-calendar").responsiveCalendar({
			time: '{{ $dt->format('Y-m') }}',
			events: {
				@foreach($events as $event)
					"{{Carbon\Carbon::parse($event->startDate)->format('Y-m-d')}}": 
						{ 
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
			},
			onDayClick: function(events) {  
				var thisDayEvent, key, year, month, day;
				year = $(this).data('year');
				month = $(this).data('month');
				day = $(this).data('day');
				
				key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
				thisDayEvent = events[key];
				console.debug("Events: '" + JSON.stringify(events, null, 4) + "'");
				console.debug("This.year: '" + JSON.stringify(year, null, 4) + "'");
				console.debug("This.month: '" + JSON.stringify(month, null, 4) + "'");
				console.debug("This.day: '" + JSON.stringify(day, null, 4) + "'");
				console.debug("key: '" + JSON.stringify(key, null, 4) + "'");
				console.debug(this == null);
				
				bootbox.dialog({
					title: "Events on: " + key,
					message:  '<div class="container-fluid"><iframe src="/eventboard/events/date/' + key + '" width="500" seamless/>'
									+ '<a href="/eventboard/events/create" class="btn btn-success">Create new event</a></div>',
					backdrop: false,
					onEscape: function() {}
				});
			}
		});
	});
</script>
@endsection
