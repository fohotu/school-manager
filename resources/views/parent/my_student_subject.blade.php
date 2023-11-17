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
                <h3 class="card-title">My Student Subject ( {{ $getUser->name }} {{ $getUser->last_name }})</h3>
      
              </div>

              

              

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->subject_name }}</td>
                      <td>{{ $value->subject_type }}</td>
                      <td>
                        <a class="btn btn-primary" href="{{ url('parent/my_student/subject/class_timetable/'.$value->class_id.'/'.$value->subject_id.'/'.$getUser->id) }}">
                          My Class Timetable
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
           
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
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

