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
                <h3 class="card-title">Add Student</h3>
              </div>
              <!-- /.card-header -->
              <form method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">First Name<i>*</i></label>
                        <input type="text" name="name" required value="{{ old('first_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Last Name<i>*</i></label>
                        <input type="text" name="name" required value="{{ old('last_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Admission Number<i>*</i></label>
                        <input type="text" name="name" required value="{{ old('first_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Roll Number</label>
                        <input type="text" name="name" value="{{ old('last_name') }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Class<i>*</i></label>
                        <select name="class_id" required class="form-control">
                          @foreach($getClass as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Gender<i>*</i></label>
                        <select name="gender" required class="form-control">
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Date Of Birth<i>*</i></label>
                        <input type="date" name="date_of_birth"   class="form-control rounded-0" placeholder="Date Of Birth">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Caste</label>
                        <input type="text" name="caste"  class="form-control rounded-0" placeholder="Caste">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Religion</label>
                        <input type="text" name="religion"   class="form-control rounded-0"  placeholder="Religion">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Mobile Number</label>
                        <input type="text" name="mobile_number"   class="form-control rounded-0"  placeholder="Mobile Number">
                      </div>
                    </div>  


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Admission Date<i>*</i></label>
                        <input type="date" name="admission_date"  class="form-control rounded-0"  placeholder="Admission Date">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Profile Pic</label>
                        <input type="file" name="profile_pic"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="Profile Pic">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Blood Group</label>
                        <input type="text" name="blood_group"   class="form-control rounded-0"  placeholder="Blood Group">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Heigth</label>
                        <input type="text" name="heigth"  class="form-control rounded-0"  placeholder="Heigth">
                      </div>
                    </div>  

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Weight</label>
                        <input type="text" name="weight" class="form-control rounded-0"  placeholder="Weight">
                      </div>

                      <div class="form-group col-6">
                        <label for="exampleInputRounded0">Status<i>*</i></label>
                        <input type="text" name="status"  class="form-control rounded-0"  placeholder="Status">
                      </div>
                    </div>  
                   

                    <div class="form-group">
                      <label for="exampleInputRounded0">Email<i>*</i></code></label>
                      <input type="text" name="email"  class="form-control rounded-0"  placeholder="Email">
                      <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputRounded0">Password</code></label>
                      <input type="password" class="form-control rounded-0"  >
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

