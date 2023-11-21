@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
             
            @foreach($getRecord as $value)  


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">My Exam Timetable ({{ $getStudent->name }} {{ $getStudent->last_name }})</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                      <tr>
                        <th>Subject Name</th>
                        <th>Day</th>
                        <th>Exam Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                        <th>Full Marks</th>
                        <th>Passing Marks</th>
                      </tr>
                      <tbody>
                        @foreach($value['exam'] as $valueW)
                          <tr>
                            <td>{{  $valueW['subject_name'] }}</td>
                            <td>{{  date('l',strtotime($valueW['exam_date'])) }}</td>
                            <td>{{  date('d-m-Y',strtotime($valueW['exam_date'])) }}</td>
                            <td>{{  date('h:i A',strtotime($valueW['start_time'])) }}</td>
                            <td>{{  date('h:i A',strtotime($valueW['end_time'])) }}</td>
                            <td>{{  $valueW['room_number'] }}</td>
                            <td>{{  $valueW['full_marks'] }}</td>
                            <td>{{  $valueW['passing_mark'] }}</td>
                          </tr>
                        @endforeach()
                       
                      </tbody>
                    </table>
                   
                </div>  
            </div> 
          
            <!-- /.card -->
            @endforeach
            
            <!-- /.card -->
          </div>
        
          <!-- /.col -->
        </div>
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

  @section('script')
        <script>
            // Ваш JavaScript...
           
        </script>
  
@endsection
