@extends('app')

@section('content')
{!! Auth::user() !!}<br>
    <h1>Edit Event: {!! $event->title !!}</h1>
{!! Form::model(['url' => 'events']) !!}
   @include('events.form', ['submitText' => 'Update!'])
{!! Form::close() !!}
@stop
