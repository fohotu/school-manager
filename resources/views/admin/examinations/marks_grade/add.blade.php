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
                <h3 class="card-title">Admin action</h3>
              </div>
              <!-- /.card-header -->
              <form method="post">
                @csrf
                <div class="card-body">


                    <div class="form-group">
                      <label for="exampleInputRounded0">Grade Name</label>
                      <input type="text" name="name" value="{{ old('name') }}"  class="form-control rounded-0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Percent From</code></label>
                      <input type="text" name="percent_from" value="{{ old('percent_from') }}"  class="form-control rounded-0">
                    
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Percent To</label>
                      <input type="text" name="percent_to" value="{{ old('percent_to') }}"  class="form-control rounded-0" >
                    </div>

                 
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>


                </div>
            </form>
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

