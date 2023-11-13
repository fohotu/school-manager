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
                                <option value="{{ $class->id }}">{{ $class->name}} </option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group col-12">
                        <label for="exampleInputRounded0">Teacher Name<i>*</i></label>
                       
                            @foreach($getTeacher as $teacher)
                            <div>
                              <label>
                                  <input type="checkbox" value="{{ $teacher->id }}" name="teacher_id[]">{{ $teacher->name}} </option>
                              </label>
                              </div>
                            @endforeach
                        
                      </div>

                      <div class="form-group col-12">
                          <select name="status" class="form-control">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
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

