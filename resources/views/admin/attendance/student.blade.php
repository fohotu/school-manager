@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Student Attendance </h3>
              </div>
              <div class="card-body">
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-4">
                      <label for="exampleInputRounded0">Class</label>
                      <select name="class_id" value="{{ Request::get('class_id') }}" class="form-control getClass">
                          <option value="">Select</option>
                          @foreach($getClass as $class)
                            <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                    </div>


                    <div class="form-group col-md-4">
                      <label for="exampleInputRounded0">Attendance Date</code></label>
                        <input class="form-control" type="date" name="attendate_date" value="{{ Request::get('attendance_date') }}"/>          
                    </div>

                    <div class="form-group col-md-4">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/attendance/student') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>
              </div>  
            </div>

             
             


            @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))

            <form action="{{ url('/admin/class_timetable/add') }}" method="post">
              @csrf
              <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}"/>
              <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}"/>
              <div class="card">
                <div class="card-header">

                  <h3 class="card-title">Class Timetable</h3>
                  @include('_message')
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                      <tr>
                        <th>Week</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                      </tr>
                      <tbody>
                        
                      </tbody>
                    </table>
                    <button class="btn btn-primary float-right">Submit</button>
                </div>  
              </div> 
            </form>
            @endif
            <!-- /.card -->

            
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
          
        </script>
  
@endsection
