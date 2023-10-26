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
                    <label for="exampleInputRounded0">Email</code></label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                    <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputRounded0">Password</code></label>
                    <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
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

