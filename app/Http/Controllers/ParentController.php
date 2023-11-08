<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Str;
use Hash;

class ParentController extends Controller
{
    //

    public function list()
    {
        
        $data['getRecord'] = User::getParent();

        $data['header_title'] = "Parent List";

        return view('admin.parent.list',$data);

    }

    public function add()
    {
        $data['header_title'] = 'Add New Parent';
        return view('admin.parent.add',$data);
    }


    public function insert(Request $request)
    {

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'occupation' => 'max:255',
      
        ]);

    

        $model = new User;
        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->gender = trim($request->gender);
        $model->occupation = trim($request->occupation);
        $model->address = trim($request->address);

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

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
        }

     
        $model->mobile_number = trim($request->mobile_number);
        $model->status = trim($request->status);
        $model->email = trim($request->email);
        $model->user_type = 4;
        $model->is_delete = 0;
        $model->password = Hash::make($request->password);
        $model->admission_date = Date('Y-m-d');
        $model->save();
        
        return redirect('admin/student/list')->with('success','Student Succesfully Created');


    }

    public function edit($id)
    {
     
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
       
            $data['header_title'] = "Edit Parent";
            return view('admin.parent.edit',$data);
        }
        else
        {
            abort(404);
        }
        

        
        
    }


    public function myStudent($id)
    {

        $data['parent_id'] = $id;
        $data['header_title'] = 'Parent Student List';
        $data['getSaerchStudent'] = User::getSearchStudent();
        return view('admin.parent.my_student',$data);

    }


    public function AssignStudentParent($student_id,$parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success','Student Successfully Asign');
    }

    

}
