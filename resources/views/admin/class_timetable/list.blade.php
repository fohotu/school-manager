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
                <h3 class="card-title">Search Class Timetable </h3>
              </div>
              <div class="card-body">
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-4">
                      <label for="exampleInputRounded0">Class Name</label>
                      <select name="class_id" value="{{ Request::get('class_id') }}" class="form-control getClass">
                          <option value="">Select</option>
                          @foreach($getClass as $class)
                            <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                    </div>


                    <div class="form-group col-md-4">
                      <label for="exampleInputRounded0">Subject Name</code></label>
                        <select name="subject_id" value="{{ Request::get('subject_id') }}" class="form-control getSubject">
                            <option value="">Select</option>
                            @if(!empty($getSubject))
                              @foreach($getSubject as $subject)
                                <option {{ (Request::get('subject_id') == $subject->id) ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                              @endforeach
                            @endif
                        </select>
                    
                    
                    </div>

                    <div class="form-group col-md-4">
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
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach([] as $value)
                    <tr>
                      <td>{{ $value->id }}</td>  
                      <td>{{ $value->class_name }}</td>  
                      <td>{{ $value->subject_name }}</td>  
                      <td>
                          @if($value->status == 0)
                            Active
                          @else
                            Inactive
                          @endif    
                      </td>  
                      <td>{{ $value->created_by }}</td>  
                      <td>{{ $value->created_date }}</td>  
                      <td>
                          <button>1</button>
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

  @section('script')
    <script type="text/javascript">
    
          $('.getClass').change(()=>{
            let class_id = $(this).val();
            alert(class_id);
            $.ajax({
              url: "{{ url('admin/class_timetable/get_subject')}}",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
                class_id:class_id,
              },
              dataType: "json",
              success:function(response){
                $(".getSubject").html(response.html);
              }
            })
          })
          
    </script>  
  @endsection
