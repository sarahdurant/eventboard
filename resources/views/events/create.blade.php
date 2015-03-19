@extends('app')

@section('content')

<h1> Create</h1>

{!! Form::open(['url' => 'events']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <input name="organizerID" id="organizerID" type="hidden" value="1">
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
    {{-- see http://eonasdan.github.io/bootstrap-datetimepicker/ --}}
    <div class="form-group">
        {!! Form::label('startDate', 'Start Date:') !!}
        <div class='input-group date' id='startDateTimePicker'>
            <input type='text' name='startDate' id='startDate' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('endDate', 'End Date:') !!}
        <div class='input-group date' id='endDateTimePicker'>
            <input type='text' name='endDate' id='endDate' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
<script>
    $(function () {
        $('#startDateTimePicker').datetimepicker();
        $('#endDateTimePicker').datetimepicker();
        $("#startDateTimePicker").on("dp.change",function (e) {
            $('#endDateTimePicker').data("DateTimePicker").minDate(e.date);
        });
        $("#endDateTimePicker").on("dp.change",function (e) {
            $('#startDateTimePicker').data("DateTimePicker").maxDate(e.date);
        });
    });</script>
@stop