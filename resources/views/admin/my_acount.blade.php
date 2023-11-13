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
                @include('_message')
                <h3 class="card-title">My Account</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="exampleInputRounded0">Name</label>
                        <input type="text" name="name" required value="{{ old('name',$getRecord->name) }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>

                      <div class="form-group col-12">
                        <label for="exampleInputRounded0">Email</label>
                        <input type="text" name="email" required value="{{ old('email',$getRecord->email) }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                        @error('email','teacher')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror  
                      </div>

                  
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

