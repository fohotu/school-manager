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
                <h3 class="card-title">Marks Crade</h3>
                <a class="btn btn-primary float-right" href="{{ url('admin/examinations/marks_grade/add') }}">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>Crade Name</th>
                      <th>Percent From</th>
                      <th>Percent To</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach($getRecord as $value)
                           <tr>
                                <td>{{ $value->name }}</td>         
                                <td>{{ $value->percent_from }}</td>         
                                <td>{{ $value->percent_to }}</td>         
                                <td>{{ $value->created_name }}</td>         
                                <td>{{ date('d-m-Y H:i A',strtotime($value->created_by)) }}</td>
                                <td>
                                    <a href="{{ url('admin/examinations/marks_grade/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/examinations/mark_grade/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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

