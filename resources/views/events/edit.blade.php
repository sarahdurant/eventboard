@extends('app')

@section('content')
    <h1>Edit Event: {!! $event->title !!}</h1>
{!! Form::model(['url' => 'events']) !!}
   @include('events.form', ['submitText' => 'Update!'])
{!! Form::close() !!}
@stop
