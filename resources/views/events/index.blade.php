@extends('app')

@section('content')
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
    {{ $events }}
@stop
