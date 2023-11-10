<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    
    public function list()
    {
        
        $data['getRecord'] = User::getTeacher();

        $data['header_title'] = "Teacher List";

        return view('admin.teacher.list',$data);

    }

    public function add()
    {
        $data['header_title'] = 'Add New Teacher';
        return view('admin.teacher.add',$data);
    }


    public function insert(Request $request)
    {

        $request->validateWithBag('teacher',[
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'current_address' => 'max:255',
            'qualification' => 'max:255',
            'work_experience' => 'max:255',
            'note' => 'max:255',
        ]);

    

        $model = new User;
        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->gender = trim($request->gender);
       

        $model->address = trim($request->current_address);
        $model->qualification = trim($request->qualification);
        $model->work_experience = trim($request->work_experience);
        $model->note = trim($request->note);
        $model->martial_status = trim($request->martial_status);
        $model->permanent_address = trim($request->permanent_address);

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->date_of_joining)){
            $model->date_of_joining = trim($request->date_of_joining);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $model->profile_photo = $filename;
        }

   
     
        $model->mobile_number = trim($request->mobile_number);
        $model->status = trim($request->status);
        $model->email = trim($request->email);
        $model->user_type = 2;
        $model->is_delete = 0;
        $model->password = Hash::make($request->password);
       
       
        $model->admission_date = Date('Y-m-d');
        
        $model->save();
        
        return redirect('admin/teacher/list')->with('success','Student Succesfully Created');


    }

    public function edit($id)
    {
     
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
       
            $data['header_title'] = "Edit Parent";
            return view('admin.teacher.edit',$data);
        }
        else
        {
            abort(404);
        }
        

        
        
    }


   
    public function delete($id)
    {

        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success','Teacher Successufully Deleted');
        }
        else
        {
            abort(404);
        }

    }

}
