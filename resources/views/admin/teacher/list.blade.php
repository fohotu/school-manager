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
                <h3 class="card-title">Teacher List</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/teacher/add') }}">Add New</a>
               
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
                      <label for="exampleInputRounded0">Gender</label>
                      <select name="gender"  class="form-control rounded-0">
                          <option @if(Request::get('gender') == 'Male') 'selected' @endif>Male</option>
                          <option @if(Request::get('gender') == 'Female') 'selected' @endif>Female</option>
                          <option @if(Request::get('gender') == 'Other') 'selected' @endif>Other</option>
                      </select>
                     
                    </div>

               

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Mobile Number</label>
                      <input type="text" name="mobile_number" value="{{ Request::get('mobile_number') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Mobile Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Martial Status</label>
                      <input type="text" name="martial_status" value="{{ Request::get('martial_status') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Martial Status">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Current Address</label>
                      <input type="text" name="current_address" value="{{ Request::get('current_address') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Current Address">
                    </div>

                  



                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Date Of Joining</label>
                      <input type="date" name="date_of_joining" value="{{ Request::get('date_of_joining') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                   
                    </div>

                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Created Date</label>
                      <input type="date" name="created_date" value="{{ Request::get('created_date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/teacher/list') }}" class="btn btn-success">clear</a>
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
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Date of Joining</th>
                      <th>Mobile Number</th>
                      <th>Martial Status</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th>Qualification</th>
                      <th>Work Experience</th>
                      <th>Note</th>
                      <th>Status</th>
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
                      <td>{{ $value->parent_name }} {{$value->parent_last_name}}</td>
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
                        <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary">edit</a>
                        <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger">delete</a>
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

