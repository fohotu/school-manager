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
                <h3 class="card-title">Search Assing class Teacher </h3>
              </div>
              <div class="card-body">
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-2">
                      <label for="exampleInputRounded0">Class Name</label>
                      <input type="text" name="class_name" value="{{ Request::get('class_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                    </div>


                    <div class="form-group col-md-2">
                      <label for="exampleInputRounded0">Teacher Name</code></label>
                      <input type="text" name="teacher_name" value="{{ Request::get('teacher_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">

                    </div>

                    <div class="form-group col-md-2">
                      <label for="exampleInputRounded0">Status</code></label>
                      <select name="status" value="{{ Request::get('status') }}" class="form-control">
                        <option value="">Select</option>
                        <option value="100">Active</option>  
                        <option value="1">Inactive</option>  
                      </select>  
                    </div>


                    <div class="form-group col-md-2">
                      <label for="exampleInputRounded0">Date</code></label>
                      <input type="date" name="date" value="{{ Request::get('date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                   
                    </div>
                    <div class="form-group col-md-2">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>
              </div>  
            </div>

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
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>  
                      <td>{{ $value->class_name }}</td>  
                      <td>{{ $value->subject_name }}</td>  
                      <td>{{ $value->subject_type }}</td>  
                      <td>{{ $value->created_date }}</td>  
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

