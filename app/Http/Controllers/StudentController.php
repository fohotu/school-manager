<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
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
        $model = new User;
        $model->name = trim($request->name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->admission_number = trim($request->admission_number);
        $model->roll_number = trim($request->roll_number);
        $model->class_id = trim($request->class_id);
        $model->gender = trim($request->gender);

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
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
        
        return redirect()->with('success','Student Succesfully Created');

    }
}
