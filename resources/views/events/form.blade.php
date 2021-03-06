 <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
    {{-- see http://eonasdan.github.io/bootstrap-datetimepicker/ --}}
    <div class="form-group">
        {!! Form::label('startDate', 'Start Date:') !!}
        <div class='input-group date' id='startDateTimePicker'>
            <input type='text' class="form-control"  name="startDate"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('endDate', 'End Date:') !!}
        <div class='input-group date' id='endDateTimePicker'>
            <input type='text' class="form-control" name="endDate" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
    </div>

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
