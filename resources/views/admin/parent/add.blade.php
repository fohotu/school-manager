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
                <h3 class="card-title">Add Parent</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">First Name<i>*</i></label>
                        <input type="text" name="first_name" required value="{{ old('first_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Last Name<i>*</i></label>
                        <input type="text" name="last_name" required value="{{ old('last_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>
                    </div>  

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputRounded0">Gender<i>*</i></label>
                            <select name="gender" required class="form-control">
                              <option value="">Select Gender</option>
                              <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                              <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                              <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                          </div>


                          <div class="form-group col-6">
                            <label for="exampleInputRounded0">Occupation</label>
                            <input type="text" name="occupation"   class="form-control rounded-0"  placeholder="Mobile Number">
                            @error('occupation','student')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                     
                    </div>  

                    <div class="row">
                        <div class="form-group col-6">
                          <label for="exampleInputRounded0">Mobile Number</label>
                          <input type="text" name="mobile_number"   class="form-control rounded-0"  placeholder="Mobile Number">
                          @error('mobile_number','student')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group col-6">
                          <label for="exampleInputRounded0">Profile Pic</label>
                          <input type="file" name="profile_pic"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Profile Pic">
                        </div>  
                   
                    </div>  

                    <div class="row">
                      <div class="form-group col-4">
                        <label for="exampleInputRounded0">Status</label>
                        <input name="status" type="text" class="form-control rounded-0"  >
                      </div>

                      <div class="form-group col-4">
                        <label for="exampleInputRounded0">Address</label>
                        <input type="text" name="address"  class="form-control rounded-0"  placeholder="Address">
                        
                        @error('email','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-4">
                        <label for="exampleInputRounded0">Date Of Birth<i>*</i></label>
                        <input type="date" name="date_of_birth"   class="form-control rounded-0" placeholder="Date Of Birth">
                        <div>{{ $errors->first('date_of_birth') }}</div>
                      </div>
                     
                    </div>  

                    <div class="row">

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Email<i>*</i></code></label>
                        <input type="text" name="email"  class="form-control rounded-0"  placeholder="Email">
                        
                          @error('email','student')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>


                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Password</label>
                        <input type="password" class="form-control rounded-0">
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

