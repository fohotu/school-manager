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
                <h3 class="card-title">Admin action</h3>
              </div>
              <!-- /.card-header -->
              <form method="post">
                @csrf
                <div class="card-body">


                    <div class="form-group">
                      <label for="exampleInputRounded0">Class</label>
                      <select name="class_id" class="form-control">
                        @foreach($getClass as $class)
                          <option {{ ($getRecord->class_id== $class->id) ? 'selected' :'' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Subject Name</code></label>
                          <select class="form-control" name="subject_id">  
                            <option value="">Select Subject</option>
                            @foreach($getSubject as $subject)
                                  <option {{ ($getRecord->subject_id == $subject->id) ? 'selected':''}} value="{{$subject->id}}">
                                        {{$subject->name}}
                                  </option>
                            @endforeach
                          </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Status</code></label>
                      <select name="status" class="form-control">
                        <option {{ ($getRecord->status == 0 ) ? 'selected':'' }} value="1">Active</option>  
                        <option {{ ($getRecord->status == 0 ) ? 'selected':'' }} value="0">Inactive</option>  
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

