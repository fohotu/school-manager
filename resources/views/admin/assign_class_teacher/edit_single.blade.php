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
                <h3 class="card-title">Add Parent</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="exampleInputRounded0">Class Name<i>*</i></label>
                        <select class="form-control" name="class_id" required>
                            <option value="">Select Class</option>
                            @foreach($getClass as $class)
                                <option value="{{ $class->id }}" {{ ($getRecord->class_id==$class->id) ? 'selected':''}}>{{ $class->name}} </option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group col-12">
                       
                      
                      <label for="exampleInputRounded0">Teacher Name<i>*</i></label>
                        <select class="form-control" name="tecaher_id" requierd>
                          @foreach($getTeacher as $teacher)  
                              <option {{ ($getRecord->teacher_id == $teacher->id) ? 'selected' : '' }}  value="{{ $teacher->id }}" >{{ $teacher->name }} {{ $teacher->last_name }}</option>
                          @endforeach
                        </select> 
                      </div>

                      <div class="form-group col-12">
                          <select name="status" class="form-control">
                            <option {{ ($getRecord->status == 0) ? 'selected':'' }} value="0">Active</option>
                            <option {{ ($getRecord->status == 1) ? 'selected':'' }} value="1">Inactive</option>
                          <select>
                      </div>
                    </div>  
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </div>
            </form>
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

