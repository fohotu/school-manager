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
                <h3 class="card-title">Assing Subject List</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/parent/add') }}">Add New</a>
              </div>
              <form method="get" action="">
                <div class="card-body row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Class Name</label>
                      <input type="text" name="name" value="{{ Request::get('name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Subject Name</label>
                      <input type="text" name="last_name" value="{{ Request::get('last_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Last Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Status</label>
                      <input type="text" name="email" value="{{ Request::get('email') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Email">
                    </div>
            
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Created By</label>
                      <select name="gender"  class="form-control rounded-0">
                          <option @if(Request::get('gender') == 'Male') 'selected' @endif>Male</option>
                          <option @if(Request::get('gender') == 'Female') 'selected' @endif>Female</option>
                          <option @if(Request::get('gender') == 'Other') 'selected' @endif>Other</option>
                      </select>
                    </div>



                   
                    <div class="form-group col-md-3">
                      <label for="exampleInputRounded0">Created Date</code></label>
                      <input type="date" name="created_date" value="{{ Request::get('created_date') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder="">
                   
                    </div>
                    <div class="form-group col-md-3">
                      <button style="margin-top:32px" type="submit" class="btn btn-primary">search</button>
                      <a style="margin-top:32px" href="{{ url('admin/parent/list') }}" class="btn btn-success">clear</a>
                    </div>
                </div> 
              </form>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-responsive">
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

