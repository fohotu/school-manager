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
                <h3 class="card-title">Add Teacher</h3>
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
                        <label for="exampleInputRounded0">Date Of Birth<i>*</i></label>
                        <input type="date" name="date_of_birth"   class="form-control rounded-0" placeholder="Date Of Birth">
                        <div>{{ $errors->first('date_of_birth') }}</div>
                      </div>

                    
                    </div>  

                    <div class="row">
                      
                    <div class="form-group col-6">
                        <label for="exampleInputRounded0">Date Of Joinning<i>*</i></label>
                        <input type="date" name="date_of_joining" class="form-control rounded-0" placeholder="Date Of Birth">
                        <div>{{ $errors->first('date_of_joining') }}</div>
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Mobile Number</label>
                        <input type="text" name="mobile_number"  class="form-control rounded-0" placeholder="Mobile Number">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Martial Status</label>
                        <input type="text" name="martial_status"   class="form-control rounded-0"  placeholder="martial_status">
                      
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Profile Pic</label>
                        <input type="file" name="profile_pic"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Profile Pic">
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Current Address</label>
                        <textarea name="current_address"  class="form-control rounded-0"></textarea>
                        @error('current_address','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Permanent Address</label>
                        <textarea name="permanent_address"  class="form-control rounded-0"></textarea>
                        @error('permanent_address','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Qualification</label>
                        <textarea name="qualification"  class="form-control rounded-0"></textarea>
                        @error('qualification','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Work Experience</label>
                        <textarea name="qualification" class="form-control rounded-0"></textarea>
                        @error('qualification','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    </div>  

                    <div class="row">
                      
                    <div class="form-group col-6">
                        <label for="exampleInputRounded0">Note</label>
                        <textarea name="note" class="form-control rounded-0"></textarea>
                        @error('note','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Status<i>*</i></label>
                        <select class="form-control" required name="status">
                          <option value="">Select Status</option>
                          <option value="0">Active</option>
                          <option value="1">Inactive</option>

                        </select>
                      </div>
                    </div>  
                   

                    <div class="form-group">
                      <label for="exampleInputRounded0">Email<i>*</i></code></label>
                      <input type="text" name="email"  class="form-control rounded-0"  placeholder="Email">
                     
                      @error('email','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Password</code></label>
                      <input type="password" name="password" class="form-control rounded-0"  >
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

