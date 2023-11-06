<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Hash;

class StudentController extends Controller
{
    //

    public function list()
    {
        
        $data['getRecord'] = User::getStudent();

        $data['header_title'] = "Student List";

        return view('admin.student.list',$data);

    }

    public function add()
    {

        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        
        return view('admin.student.add',$data);

    }


    public function insert(Request $request)
    {

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users',
            'wieght' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15',
            'caste'  => 'max:50',
            'admission_number'  => 'max:50',
            'height' => 'max:10',
        ]);

    

        $model = new User;
        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->admission_number = trim($request->admission_number);
        $model->roll_number = trim($request->roll_number);
        $model->class_id = trim($request->class_id);
        $model->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $model->profile_photo = $filename;
        }

        $model->caste = trim($request->caste);
        $model->religion = trim($request->religion);
        $model->mobile_number = trim($request->mobile_number);
        $model->admission_date = trim($request->admission_date);
        $model->blood_group = trim($request->blood_group);
        $model->height = trim($request->height);
        $model->weight = trim($request->weight);
        $model->status = trim($request->status);
        $model->email = trim($request->email);
        $model->user_type = 3;
        $model->is_delete = 0;
        $model->password = Hash::make($request->password);
        $model->save();
        
        return redirect('admin/student/list')->with('success','Student Succesfully Created');


    }

    public function edit($id)
    {
     
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit',$data);
        }
        else
        {
            abort(404);
        }
        

        
        
    }

    public function update(Request $request,$id)
    {

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users,email,'.$id,
            'wieght' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15',
            'caste'  => 'max:50',
            'admission_number'  => 'max:50',
            'height' => 'max:10',
            'roll_number' => 'max:50',
            'religon' => 'max:50',
        ]);


        $model = User::getSingle($id);
        

        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->admission_number = trim($request->admission_number);
        $model->roll_number = trim($request->roll_number);
        $model->class_id = trim($request->class_id);
        $model->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $model->profile_photo = $filename;
        }

        $model->caste = trim($request->caste);
        $model->religion = trim($request->religion);
        $model->mobile_number = trim($request->mobile_number);


        if(!empty($request->admission_date)){
            $model->admission_date = trim($request->admission_date);
        }
        
        
        $model->blood_group = trim($request->blood_group);
        $model->height = trim($request->height);
        $model->weight = trim($request->weight);
        $model->status = trim($request->status);
        $model->email = trim($request->email);
        $model->user_type = 3;
        $model->is_delete = 0;

        if(!empty($request->password)){
            $model->password = Hash::make($request->password);
        }

        $model->save();

        return redirect('admin/admin/list')->with('success','Admin successfully updated');
    
    }


    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/student/list')->with('success','Student successfully deleted');
        }
        else
        {
            abort(404);
        }
    }

}
