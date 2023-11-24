@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Exam Result ({{ $getStudent->name }} {{ $getStudent->last_name }})</h1>
            </div>
        </div>
      </div>    
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @foreach($getRecord as $value)
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['exam_name'] }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                   
                      <th>Subject Name</th>
                      <th>Class Work</th>
                      <th>Test Work</th>
                      <th>Home Work</th>
                      <th>Exam</th>
                      <th>Total Score</th>
                      <th>Passing Mark</th> 
                      <th>Full Marks</th> 
                      <th>Result</th>

                    </tr>
                  </thead>
                  <tbody>
                      @php 
                        $total_score = 0;
                        $full_marks = 1;
                        $result_validation = 0;
                      @endphp 
                      @foreach($value['subject'] as $exam)
                        @php 
                          $total_score = $total_score + $exam['total_score'];
                          $full_marks = $full_marks + $exam['full_marks'];
                        @endphp 
                        <tr>
                          <td>{{ $exam['subject_name'] }}</td>
                          <td>{{ $exam['class_work'] }}</td>
                          <td>{{ $exam['test_work'] }}</td>
                          <td>{{ $exam['home_work'] }}</td>
                          <td>{{ $exam['exam'] }}</td>
                          <td>{{ $exam['total_score'] }}</td>
                          <td>{{ $exam['passing_mark'] }}</td>
                          <td>{{ $exam['full_marks'] }}</td>
                          <td>
                            @if($exam['total_score'] >= $exam['passing_mark'])
                              <span style="color:green">Pass</span>
                            @else
                              @php 
                                $result_validation = 1;
                              @endphp 
                              <span style="color:red">Fail</span>
                            @endif  
                          </td>  
                        </tr>   
                      @endforeach
                      <tr>
                          <td colspan="2">
                              <b>Grand Total : {{ $total_score }} / {{ $full_marks }}</b>  
                          </td>  
                          @php 
                                $percentage = round((($total_score *100) / $full_marks),2);
                                $getGrade = App\Models\MarksGradeModel::getGrade($percentage);
                          @endphp 
                          <td colspan="2">
                              <b>Percentage : {{ $percentage }} </b>  
                          </td>
                          <td colspan="2">
                              <b>Grade : {{ $getGrade }} </b>  
                          </td> 
                          <td colspan="3">
                              <b>
                                Result : 
                                  @if($result_validation == 0)
                                    <span style="color:green">Pass</span>
                                  @else
                                    <span style="color:red">Fail</span>
                                  @endif

                              </b>  
                          </td>   
                      </tr>  
                  </tbody>
                </table>
              </div>


              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>

          @endforeach
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

