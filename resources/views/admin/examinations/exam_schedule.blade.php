@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              @include('_message')
              <div class="card-header">
                <h3 class="card-title">Exam List</h3>
                <a class="btn btn-primary float-right" href="{{ url('exmaniations/exam/add') }}">Add New</a>
              </div>
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Search Exam Schedule</label>
                      <select class="form-control" name="exam_id">
                        <option value="">Select</option>
                        @foreach($getExam as $exam)
                        <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' :''}} value="{{ $exam->id }}">{{ $exam->name }}</option>           
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Class</code></label>
                      <select class="form-control" name="class_id">
                        <option value="">Select</option>
                        @foreach($getClass as $class)
                        <option {{ (Request::get('class_id') == $class->id) ? 'selected' :''}} value="{{ $class->id }}">{{ $class->name }}</option>           
                        @endforeach
                      </select> 
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/examinations/exam_schedule') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

              <!-- /.card-header -->

              
            @if(!empty($getRecord))
            <form action="{{ url('admin/examinations/exam_schedule_insert') }}" method="post">    
                @csrf
                <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}"/>
                <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}"/>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                     
                      <th>Subject Name</th>
                      <th>Exam Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Room Number</th>
                      <th>Full Marks</th>
                      <th>Passing Marks</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                       $i = 1; 
                    @endphp 
                     @foreach($getRecord as $value)
                     <tr>
                      <td>
                        {{ $value['subject_name'] }}
                        <input type="hidden" class="form-control" value="{{ $value['subject_id'] }}" name="schedule[{{$i}}][subject_id]"/>   
                      </td>
                      <td>
                        <input type="date" class="form-control"  value="{{ $value['exam_date'] }}"  name="schedule[{{ $i }}][exam_date]"/>
                      </td>
                      <td>
                        <input type="time" class="form-control" value="{{ $value['start_time'] }}" name="schedule[{{ $i }}][start_time]"/>
                      </td>
                      <td>
                        <input type="time" class="form-control" value="{{ $value['end_time'] }}" name="schedule[{{ $i }}][end_time]"/>
                      </td>
                      <td>
                        <input type="text" class="form-control" value="{{ $value['room_number'] }}" name="schedule[{{ $i }}][room_number]"/>
                      </td>
                      <td>
                        <input type="text" class="form-control" value="{{ $value['full_marks'] }}" name="schedule[{{ $i }}][full_marks]"/>
                      </td>
                      <td>
                        <input type="text" class="form-control" value="{{ $value['passing_mark'] }}" name="schedule[{{ $i }}][passing_mark]"/>
                      </td>
                    </tr>
                     @php 
                        $i++;
                     @endphp 
                     @endforeach
                  </tbody>
                </table>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
             
             </div>

            </form>

              @endif

              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>
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

