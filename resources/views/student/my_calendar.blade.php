@extends('layouts.app')

@section('style')
<style type="text/css">
    .fc-daygrid-event {
        white-space: normal;
    }
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div id="calendar"></div>
          
          </div>
        
        </div>
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

  @section('script')
        <script src="{{ url('fullcalendar/dist/index.global.js') }}"></script>
        
        <script type="text/javascript">
        
            let events = [];
            
            @foreach($getMyTimeTable as $value)
                @foreach($value['week'] as $week)
                    events.push({
                        title: '{{ $value['name'] }}',
                        daysOfWeek:[{{ $week['fullcalendar_day'] }}],
                        startTime:'{{ $week['start_time'] }}',
                        endTime:'{{ $week['end_time'] }}',
                    })
                @endforeach
            @endforeach


            @foreach($getExamTimeTable as $value)
                @foreach($value['exam'] as $exam)
                    events.push({
                        title: '{{ $value['name'] }} - {{ $exam['subject_name'] }} ({{ date('h:i A',strtotime($exam['start_time'])) }} to {{ date('h:i A',strtotime($exam['end_time'])) }} )',
                        startTime:'{{ $exam['start_time'] }}',
                        endTime:'{{ $exam['end_time'] }}',
                        color:'red',
                        url:'{{ url('student/my_exam_timetable') }}'
                    })
                @endforeach
            @endforeach

        
            let calendarId = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarId,{
                headerToolbar: {
                    left:'prev,next,today',
                    center:'title',
                    right:'dayGridMonth, timeGridWeek, timeGridDay, listMonth',
                },
                initialDate:'<?php echo date('Y-m-d');?>',
                navlinks:true,
                editable:false,
                events:events,
                initialView:'timeGridWeek',
            });

            calendar.render();
        </script>
@endsection
