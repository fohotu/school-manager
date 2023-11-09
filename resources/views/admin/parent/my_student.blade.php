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
                      <label for="exampleInputRounded0">Student id</label>
                      <input type="text" name="id" value="{{ Request::get('id') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Student ID">
                    </div>
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
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/parent/list') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

              <!-- /.card-header -->
              <div class="card-body">
     

           
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
        
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
             

              <!-- /.card-header -->
              <div class="card-body">
              @if(!empty($getSaerchStudent))
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Photo</th>
                      <th>Student Name</th>
                      <th>Parent Name</th>
                      <th>Email</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                
                  <tbody>

                  
                    @foreach($getSaerchStudent as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile()}}" style="width:100px;border-radius:100%"/>
                        @endif
                      </td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->parent_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary">Assign Student to Parent</a>
                      </td> 
                    </tr>

                    @endforeach

                 
                    
                  </tbody>
              
                </table>

                @endif

           
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>

            <div class="card">
         
              <div class="card-header">
                <h3 class="card-title">Parent Student List {{ $getParent->name }} {{ $getParent->last_name }}</h3>
              </div>
              

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
                  @if(!empty($getRecord))
                  
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
                        
                        <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id) }}" class="btn btn-danger">delete</a>
                      </td>
              
                    </tr>

                    @endforeach

                 
                    
                  </tbody>
                  @endif
                </table>
           
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
              </div>
            </div>

            
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

