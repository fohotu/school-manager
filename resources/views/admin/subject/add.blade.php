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
                      <label for="exampleInputRounded0">Name</label>
                      <input type="text" name="name" value="{{ old('name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Select Type</code></label>
                      <select name="type" class="form-control">
                        <option value="Theory">Theory</option>  
                        <option value="Practical">Practical</option>  
                      </select>  
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Status</code></label>
                      <select name="status" class="form-control">
                        <option value="1">Active</option>  
                        <option value="0">Inactive</option>  
                      </select>  
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

