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
                <h3 class="card-title">My Student</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/parent/add') }}">Add New</a>
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
                            <a href ="{{ url('parent/my_student/subject/'.$value->id) }}" class="btn btn-primary" >Subject</a>
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

