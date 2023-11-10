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
                <h3 class="card-title">My Account</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">First Name<i>*</i></label>
                        <input type="text" name="first_name" required value="{{ old('first_name',$getRecord->first_name) }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Last Name<i>*</i></label>
                        <input type="text" name="last_name" required value="{{ old('last_name',$getRecord->last_name) }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>
                    </div>  

                   

                    <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputRounded0">Gender<i>*</i></label>
                        <select name="gender" value="{{ old('gender',$getRecord->gender) }}" required class="form-control">
                          <option value="">Select Gender</option>
                          <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                          <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                          <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                        </select>
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Date Of Birth<i>*</i></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$getRecord->date_of_birth) }}"  class="form-control rounded-0" placeholder="Date Of Birth">
                        <div>{{ $errors->first('date_of_birth') }}</div>
                      </div>

                    
                    </div>  

                    <div class="row">
                      
                    <div class="form-group col-6">
                        <label for="exampleInputRounded0">Date Of Joinning<i>*</i></label>
                        <input type="date" name="date_of_joining" value="{{ old('date_of_joining',$getRecord->date_of_joining) }}" class="form-control rounded-0" placeholder="Date Of Birth">
                        <div>{{ $errors->first('date_of_joining') }}</div>
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Mobile Number</label>
                        <input type="text" name="mobile_number" value="{{ old('mobile_number',$getRecord->mobile_number) }}"  class="form-control rounded-0" placeholder="Mobile Number">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Martial Status</label>
                        <input type="text" name="martial_status" value="{{ old('martial_status',$getRecord->martial_status) }}"  class="form-control rounded-0"  placeholder="martial_status">
                      
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Profile Pic</label>
                        <input type="file" name="profile_pic"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Profile Pic">
                        @if(!empty($getRecord->getProfile()))
                          <img src="{{ $getRecord->getProfile()}}" style="width:100px"/>
                        @endif
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Current Address</label>
                        <textarea name="current_address"  class="form-control rounded-0"> {{ old('current_address',$getRecord->current_address) }} </textarea>
                        @error('current_address','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Permanent Address</label>
                        <textarea name="permanent_address"  class="form-control rounded-0"> {{ old('permanent_address',$getRecord->permanent_address) }} </textarea>
                        @error('permanent_address','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Qualification</label>
                        <textarea name="qualification"  class="form-control rounded-0"> {{ old('qualification',$getRecord->qualification) }} </textarea>
                        @error('qualification','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Work Experience</label>
                        <textarea name="work_experience" class="form-control rounded-0"> {{ old('work_experience',$getRecord->work_experience) }} </textarea>
                        @error('work_experience','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                    </div>  

                    <div class="row">
                      
                    <div class="form-group col-6">
                        <label for="exampleInputRounded0">Note</label>
                        <textarea name="note" class="form-control rounded-0"> {{ old('note',$getRecord->note) }} </textarea>
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
                      <input type="text" name="email"  value="{{ old('email',$getRecord->email) }}" class="form-control rounded-0"  placeholder="Email">
                     
                      @error('email','teacher')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
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

