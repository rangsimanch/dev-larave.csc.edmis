@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.tasksCalendar.title') }}
    </div>

    <div class="card-body">
        
        <link rel="stylesheet" href="{{URL('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css')}}" />
        <div id="calendar"></div>



    </div>
</div>
@endsection

@section('scripts')
@parent

<link href='fullcalendar/bootstrap/main.css' rel='stylesheet' />
<script src='fullcalendar/bootstrap/main.js'></script>

<script src='{{ URL('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js') }}'></script>
<script src='{{ URL('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js') }}'></script>
<script>
     
    $(document).ready(function() {
            // page is now ready, initialize the calendar...
            
            $('#calendar').fullCalendar({
                // put your options and callbacks here
               // defaultView: 'agendaWeek',
               header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay, listWeek'
                },
                events : [
                            @foreach($events as $event)
                                @if($event->due_date)
                                    {
                                        title : '{{ trans('global.task_name') . $event->name}}',
                                        description: '{{ trans('global.responsible') . $event->user_create->name }}',
                                        start : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'),$event->due_date)->format('Y-m-d H:i:s') }}',
                                        end : '{{ \Carbon\Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'),$event->end_date)->format('Y-m-d H:i:s') }}',
                                    },
                                @endif
                            @endforeach
                ],
                eventColor: '#378006',
                eventTextColor: '#FFFFFF',
                timeFormat: 'H(:mm)',
                eventLimit: true,   
                eventLimitClick: 'popover',
                
                 eventClick: function(event) {
                     $("#successModal").modal("show");
                     $("#successModal .modal-title h2").text(event.title);
                     $("#successModal .modal-body p").text(event.description);
                 },
                
            })
        });

        
        
</script>
<style>
    
.fc-license-message {
    display: none;
}

title {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 18px;
}

body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
}

#calendar {
max-width: 900px;
margin: 50px auto;
}

.fc-event {
    cursor: pointer;
}
</style>

<div class="container">
    <div id='calendar'></div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                <h2></h2>
                
                <div class="modal-body">
                <p></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop