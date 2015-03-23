@extends('app')

@section('content')

<div class="col-md-12">
<h1> Create</h1>
</div>

{!! Form::open(['url' => 'events']) !!}
   @include('events.form', ['submitText' => 'Let\'s Go!'])
{!! Form::close() !!}

	@include('errors.list')

@stop
