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
                <h3 class="card-title">Class List</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/subject/add') }}">Add New</a>
               
              </div>

              

              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Class Name</label>
                      <input type="text" name="class_name" value="{{ Request::get('name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                    </div>


                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Subject Name</code></label>
                      <select name="subject_name" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Theory">Theory</option>  
                        <option value="Practical">Practical</option>  
                      </select>  
                    </div>


                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Date</code></label>
                      <input type="date" name="date" value="{{ Request::get('date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                   
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/subject/list') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

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
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->class_name }}</td>
                      <td>{{ $value->subject_name }}</td>
                      <td>{{ ($value->status) ? 'Active' : 'Inactive' }}</td>
                  
                      <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                      <td>{{ $value->created_by_name }}</td>
                      <td>
                      <a href="{{ url('admin/assign_subject/edit/'.$value->id) }}" class="btn btn-primary">edit</a>
                        <a href="{{ url('admin/assign_subject/edit_single/'.$value->id) }}" class="btn btn-primary">edit Single</a>
                        <a href="{{ url('admin/assign_subject/delete/'.$value->id) }}" class="btn btn-danger">delete</a>
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

