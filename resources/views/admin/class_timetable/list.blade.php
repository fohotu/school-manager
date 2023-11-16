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
                                <option {{ (Request::get('subject_id') == $subject->subject_id) ? 'selected' : '' }} value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
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
                        @php 
                          $i=1;
                        @endphp
                        @foreach($week as $value)
                            <tr>
                                <th>
                                  <input type="hidden" name="timetable[{{ $i }}][week_id]" value="{{ $value['week_id'] }}">
                                  {{ $value['week_name'] }}
                                </th>
                                <td>
                                  <input type="time" name="timetable[{{ $i }}][start_time]" value="{{ $value['start_time'] }}" class="form-control">
                                </td>  
                                <td>
                                  <input type="time" name="timetable[{{ $i }}][end_time]" value="{{ $value['end_time'] }}" class="form-control">
                                </td>  
                                <td>
                                  <input type="text" name="timetable[{{ $i }}][room_number]"   value="{{ $value['room_number'] }}" class="form-control">
                                </td>  
                            </tr>
                            @php 
                              $i++;
                            @endphp 
                        @endforeach
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
            // Ваш JavaScript...
            $(document).on('change','.getClass',function(){
              let class_id = $(this).val();
             

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

            });
        </script>
  
@endsection
