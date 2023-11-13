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
                          <option {{ ($getRecord->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                          <option {{ ($getRecord->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                          <option {{ ($getRecord->gender == 'Other') ? 'selected' : '' }} value="Other">Other</option>
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
                          <label for="exampleInputRounded0">Caste</label>
                          <input type="text" name="caste" value="{{ old('caste',$getRecord->caste) }}" class="form-control rounded-0" placeholder="Caste">
                          <div>{{ $errors->first('date_of_joining') }}</div>
                      </div>

                      <div class="form-group col-6">
                          <label for="exampleInputRounded0">Religion</label>
                          <input type="text" name="religion" value="{{ old('religion',$getRecord->religion) }}" class="form-control rounded-0" placeholder="Religion">
                          <div>{{ $errors->first('date_of_joining') }}</div>
                      </div>
                      
                    
                     
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Mobile Number</label>
                        <input type="text" name="mobile_number" value="{{ old('mobile_number',$getRecord->mobile_number) }}"  class="form-control rounded-0" placeholder="Mobile Number">
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
                        <label for="exampleInputRounded0">Blood Group</label>
                        <input type="text" name="blood_group" value="{{ old('blood_group',$getRecord->blood_group) }}" class="form-control rounded-0"  placeholder="Blood Group">
                        @error('blood_group','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Heigth</label>
                        <input type="text" name="height" value="{{ old('height',$getRecord->height) }}" class="form-control rounded-0"  placeholder="Heigth">
                        @error('heigth','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Weight</label>
                        <input type="text" name="weight" value="{{ old('weight',$getRecord->weight) }}" class="form-control rounded-0"  placeholder="Weight">
                        @error('weight','student')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>  

                    </div>  

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputRounded0">Email<i>*</i></code></label>
                          <input type="text" name="email"  value="{{ old('email',$getRecord->email) }}" class="form-control rounded-0"  placeholder="Email">
                          @error('email','teacher')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
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

