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
                <h3 class="card-title">Student List</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/parent/add') }}">Add New</a>
              </div>
              
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Name</label>
                      <input type="text" name="name" value="{{ Request::get('name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Last Name</label>
                      <input type="text" name="last_name" value="{{ Request::get('last_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Last Name">
                    </div>


                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Email</label>
                      <input type="text" name="email" value="{{ Request::get('email') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Email">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Admission Number</label>
                      <input type="text" name="admission_number" value="{{ Request::get('admission_number') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Admission Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Roll Number</label>
                      <input type="text" name="roll_number" value="{{ Request::get('roll_number') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Roll Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Class</label>
                      <input type="text" name="class" value="{{ Request::get('class') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Class">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Gender</label>
                      <select name="gender"  class="form-control rounded-0">
                          <option @if(Request::get('gender') == 'Male') 'selected' @endif>Male</option>
                          <option @if(Request::get('gender') == 'Female') 'selected' @endif>Female</option>
                          <option @if(Request::get('gender') == 'Other') 'selected' @endif>Other</option>
                      </select>
                     
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Caste</label>
                      <input type="text" name="caste" value="{{ Request::get('caste') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Caste">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Religion</label>
                      <input type="text" name="religion" value="{{ Request::get('religion') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Religion">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Mobile Number</label>
                      <input type="text" name="mobile_number" value="{{ Request::get('mobile_number') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Mobile Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Blood Group</label>
                      <input type="text" name="blood_group" value="{{ Request::get('blood_group') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Blood Group">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Status</label>
                      <input type="text" name="status" value="{{ Request::get('status') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                    </div>


                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Admission Date</code></label>
                      <input type="date" name="admission_date" value="{{ Request::get('admission_date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                   
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Created Date</code></label>
                      <input type="date" name="created_date" value="{{ Request::get('created_date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                   
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/student/list') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>
                          Photo
                      </th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>admission_number</th>
                      <th>roll_number</th>
                      <th>class_name</th>
                      <th>gender</th>
                      <th>gedate_of_birthnder</th>
                      <th>caste</th>
                      <th>religion</th>
                      <th>mobile_number</th>
                      <th>admission_date</th>
                      <th>blood_group</th>
                      <th>height</th>
                      <th>weight</th>
                      <th>status</th>

                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile()}}" style="width:100px;border-radius:100%"/>
                        @endif
                      </td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->admission_number }}</td>
                      <td>{{ $value->roll_number }}</td>
                      <td>{{ $value->class_name }}</td>
                      <td>{{ $value->gender }}</td>
                      <td>
                        @if(!empty($value->date_of_birth))
                            {{ date('d-m-Y',strtotime($value->date_of_birth)) }}
                        @endif
                      </td>
                      <td>{{ $value->caste }}</td>
                      <td>{{ $value->religion }}</td>
                      <td>{{ $value->mobile_number }}</td>
                      <td>
                        @if(!empty($value->admission_date))
                            {{ date('d-m-Y',strtotime($value->admission_date)) }}
                        @endif
                      </td>
                      <td>{{ $value->blood_group }}</td>
                      <td>{{ $value->height }}</td>
                      <td>{{ $value->weight }}</td>
                      <td>{{ $value->status }}</td>
                      <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/student/edit/'.$value->id) }}" class="btn btn-primary">edit</a>
                        <a href="{{ url('admin/student/delete/'.$value->id) }}" class="btn btn-danger">delete</a>
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

