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
                <h3 class="card-title">Add Class Timetable</h3>
              </div>
              <!-- /.card-header -->
              <form method="post">
                @csrf
                <div class="card-body">


                    <div class="form-group">
                      <label for="exampleInputRounded0">Class</label>
                      <select name="class_id" class="form-control">
                        @foreach($getClass as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Subject Name</code></label>
                          @foreach($getSubject as $subject)
                            <p>
                              <label>
                                <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]">{{ $subject->name }}
                              </label>
                            </p>
                          @endforeach
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Status</code></label>
                      <select name="status" class="form-control">
                        <option value="1">Active</option>  
                        <option value="0">Inactive</option>  
                      </select>  
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

