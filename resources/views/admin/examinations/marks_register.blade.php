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
                <h3 class="card-title">Marks Register</h3>
                <a class="btn btn-primary float-right" href="{{ url('exmaniations/exam/add') }}">Add New</a>
              </div>
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Search Exam Schedule</label>
                      <select class="form-control" name="exam_id">
                        <option value="">Select</option>
                        @foreach($getExam as $exam)
                        <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' :''}} value="{{ $exam->id }}">{{ $exam->name }}</option>           
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Class</code></label>
                      <select class="form-control" name="class_id">
                        <option value="">Select</option>
                        @foreach($getClass as $class)
                        <option {{ (Request::get('class_id') == $class->id) ? 'selected' :''}} value="{{ $class->id }}">{{ $class->name }}</option>           
                        @endforeach
                      </select> 
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/examinations/exam_schedule') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

              <!-- /.card-header -->


          

              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>
            <!-- /.card -->
           
            @if(!empty($getSubject) && !empty($getSubject->count()))

            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Marks Register</h3>
              </div>  
              <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Student name</th>
                        @foreach($getSubject as $subject)
                        <th>
                          {{ $subject->subject_name }} <br />
                          ({{ $subject->subject_type }}) : {{ $subject->passing_mark }} / {{ $subject->full_marks }}
                        </th>
                        @endforeach  
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($getStudent) && !empty($getStudent->count()))
                          @foreach($getStudent as $student)
                          <form name="post" class="SubmitForm">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                            <tr>
                              <td>{{ $student->name }} {{ $student->last_name }}</td>
                              @php 
                                $i=1;   
                                $totalStudentMark = 0;
                                $totalFullMarks = 0;  
                                $totalPassingMark = 0;
                                $pass_fail_val = 0;
                              @endphp 
                              @foreach($getSubject as $subject)
                                @php
                                  $totalMark = 0;
                                  $totalFullMarks = $totalFullMarks + $subject->full_marks;
                                  $totalPassingMark = $totalPassingMark + $subject->passing_mark;

                                  $getMark = $subject->getMark($student->id,Request::get('exam_id'),Request::get('class_id'),$subject->subject_id);

                                  if(!empty($getMark))
                                  {
                                    $totalMark = $getMark->class_work + $getMark->home_work + $getMark->testWork + $getMark->exam;
                                  }

                                  $totalStudentMark = $totalStudentMark + $totalMark;

                                  
                                  
                                  @endphp 
                                <td>
                                  <div style="margin-bottom:10px">
                                    Class work
                                    <input type ="hidden" name="mark[{{ $i }}][full_marks]" value="{{ $subject->full_marks }}" />
                                    <input type ="hidden" name="mark[{{ $i }}][passing_mark]" value="{{ $subject->passing_mark }}" />
                                   
                                    <input type ="hidden" name="mark[{{ $i }}][id]" value="{{ $subject->id }}" />
                                    <input type ="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}" />
                                    <input type ="text" name="mark[{{ $i }}][class_work]" style="width:200px" 
                                    class="form-control" placeholder="Enter Marks" 
                                    id="class_work_{{ $student->id }}{{ $subject->subject_id }}" value="{{ !empty($getMark->class_work) ? $getMark->class_work : '' }}"/>
                                  </div>  
                                  <div style="margin-bottom:10px">
                                    Home work
                                    <input type ="text" id="home_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][home_work]" style="width:200px" class="form-control" placeholder="Enter Marks" value="{{ !empty($getMark->home_work) ? $getMark->home_work : '' }}"/>
                                  </div>  
                                  <div style="margin-bottom:10px">
                                    Test work
                                    <input type ="text" id="test_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][test_work]" style="width:200px" class="form-control" placeholder="Enter Marks" value="{{ !empty($getMark->test_work) ? $getMark->test_work : '' }}"/>
                                  </div>  
                                  <div style="margin-bottom:10px">
                                    Exam
                                    <input type ="text" id="exam_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][exam]" style="width:200px" class="form-control" placeholder="Enter Marks" value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}"/>
                                  </div>  

                                  <div style="margin-bottom:10px">
                                      <button type="button" class="btn btn-primary SaveSingleSubject" id="{{ $student->id }}" data-schedule="{{ $subject->id }}" data-val="{{ $subject->subject_id }}" data-exam="{{ Request::get('exam_id') }}" data-class="{{ Request::get('class_id') }}">Save</button>
                                  </div>
                                  @if(!empty($getMark))
                                  <div style="margin-bottom: 10px;">
                                      <b>Total Mark :</b>{{ $totalMark }}
                                      <b>Passing Mark :</b>{{ $subject->passing_mark }}
                                      @php 
                                        $getLoopGrade = App\Models\MarksGradeModel::getGrade($totalMark);
                                      @endphp 
                                      @if(!empty($getLoopGrade))
                                        <b>Grade </b>{{ $getLoopGrade }}
                                      @endif  
                                      @if($totalMark >= $subject->passing_mark)
                                        <span style="color:green;fonr-weight:bold">Pass</span>
                                      @else
                                        <span style="color:green;fonr-weight:bold">Fail</span>
                                        @php 
                                          $pass_fail_val = 1;
                                        @endphp 
                                      
                                      @endif
                                  </div>
                                  @endif
                                </td>  
                                @php 
                                  $i++;
                                @endphp 
                              @endforeach
                                <td>
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <br />

                                  @if($totalStudentMark)
                                      
                                      Total Student Mark : {{ $totalStudentMark }}
                                      
                                      <br />
                                      
                                      Total Subject Mark : {{ $totalFullMarks }}
                                      
                                      <br />
                                      
                                      Total Passing Mark : {{ $totalPassingMark }}
                                      
                                      </br>

                                      @php 
                                        $percentage = ($totalStudentMark * 100) / $totalFullMarks;
                                        $percentage = round($percentage);

                                        $getGrade = App\Models\MarksGradeModel::getGrade($percentage);
                                      @endphp 

                                      <b>Percentage:</b> {{$percentage}}


                                      @if(!empty($getGrade))
                                        <b>Grade :</b> {{ $getGrade }} %  
                                      @endif

                                      @if($pass_fail_val == 0)
                                        <span style="color:green;fonr-weight:bold">Pass</span>
                                      @else
                                        <span style="color:green;fonr-weight:bold">Fail</span>
                                      @endif

                                  @endif
                                 

                                </td>
                            </tr>  
                          </form>
                          @endforeach
                      @endif
                    </tbody>  
                  </table>
              </div>  
            </div>  

            @endif

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
    $('.SubmitForm').submit(function(e){
      alert(1);
      e.preventDefault();
      $.ajax({
        type:"POST",
        url:"{{ url('admin/examinations/submit_marks_register') }}",
        data: $(this).serialize(),
        dataType: "json",
        success:function(data)
        {
          alert(data.message);
        }
      })
    })

    $('.SaveSingleSubject').click(function(e){

      let student_id = $(this).attr('id');
      let subject_id = $(this).attr('data-val');
      let exam_id = $(this).attr('data-exam');
      let class_id = $(this).attr('data-class');
      let id = $(this).attr('data-schedule');


      let class_work  = $('#class_work_'.student_id+subject_id);
      let home_work  = $('#home_work'.student_id+subject_id);
      let test_work  = $('#test_work'.student_id+subject_id);
      let exam  = $('#exam'.student_id+subject_id);
      
      $.ajax({
        type:"POST",
        url:"{{ url('admin/examinations/single_submit_marks_register') }}",
        data: {
          student_id,
          subject_id,
          exam_id,
          class_id,
          class_work,
          home_work,
          test_work,
          exam

        },
        dataType: "json",
        success:function(data)
        {
          alert(data.message);
        }
      })

    });

  </script>  
@endsection
