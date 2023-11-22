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
            


            @foreach($getClassTimetable as $value)
                events.push({
                    title: 'Class : {{ $value->class_name }} - {{ $value->subject_name }}',
                    daysOfWeek:[{{ $value->fullcalendar_day }}],
                    startTime:'{{ $value->start_time }}',
                    endTime:'{{ $value->end_time }}',
                })
               
            @endforeach


          
            @foreach($getExamTimetable as  $exam)
                events.push({
                    title: 'Exam : {{ $exam->class_name }} - {{ $exam->exam_name }} - {{ $exam->subject_name }} ({{ date('h:i A',strtotime($exam->start_time)) }} to {{ date('h:i A',strtotime($exam->end_time)) }} )',
                    startTime:'{{ $exam->start_time }}',
                    endTime:'{{ $exam->end_time }}',
                    color:'red',
                    url:'{{ url('teacher/my_exam_timetable') }}'
                })
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
