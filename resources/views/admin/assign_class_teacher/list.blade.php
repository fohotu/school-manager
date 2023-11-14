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
                <h3 class="card-title">Assing class Teacher List</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/assign_class_teacher/add') }}">Assign Class to Teacher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Class Name</th>
                      <th>Teacher Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>  
                      <td>{{ $value->class_name }}</td>  
                      <td>{{ $value->teacher_name }}</td>  
                      <td>{{ $value->status }}</td>  
                      <td>{{ $value->created_by }}</td>  
                      <td>{{ $value->created_date }}</td>  
                      <td>
                        <a href="{{ url('/admin/assign_class_teacher/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/admin/assign_class_teacher/edit_single/'.$value->id) }}" class="btn btn-primary">Edit Single</a>
                        <a href="" class="btn btn-danger">Delete</a>
                      </td>  

                    </tr>

                    @endforeach
                    
                  </tbody>
                </table>
           
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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

