<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
use Auth;

class AssingClassTeacherController extends Controller
{
    //

    public function list()
    {

        $data['header_title'] = "Assing Class Teacher";
       
        $data['getRecord'] = AssignClassTeacherModel::getRecord();

  

        return view('admin.assign_class_teacher.list',$data);

    }


    public function add()
    {

        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Add Assing Class Teacher";
        return view("admin.assign_class_teacher.add",$data);

    }


    public function insert(Request $request)
    {
       if(!empty($request->teacher_id))
       {
            foreach($request->teacher_id as $teacher_id){
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id,$teacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $model = new AssignClassTeacherModel;
                    $model->class_id = $request->class_id;
                    $model->teacher_id = $teacher_id;
                    $model->status = $request->status;
                    $model->created_by = Auth::user()->id;
                    $model->save();
                  
                    
                    

                }
            }

            return redirect('admin/assign_class_teacher/list')->with('success','Assign Class to Teacher Successfully');
       }
       else
       {
            return redirect()->back()->with('error','Due to some error please try again');
       }
    }



    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit Assign Subject';
            return view('admin.assign_class_teacher.edit',$data);
        }
        else 
        {
            abort(404);
        }
    }



    public function update($id,Request $request)
    {

        AssignClassTeacherModel::deleteTeacher($request->class_id);

        if(!empty($request->teacher_id))
        {
            foreach($request->teacher_id as $teacher_id)
            {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id,$teacher_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $model = new AssignClassTeacherModel;
                    $model->class_id = $request->class_id;
                    $model->teacher_id = $teacher_id;
                    $model->status = $request->status;
                    $model->created_by = Auth::user()->id;
                    $model->save();
                }
            }
        }
        
        return redirect('admin/assign_class_teacher/list')->with('succcess','Assign Class To Teacher Successfully');
    
    }



    public function edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit Assign Class Teacher';
            return view('admin.assign_class_teacher.edit_single',$data);
        }
        else 
        {
            abort(404);
        }
    }



    public function updateSingle(Request $request,$id)
    {

        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id,$request->teacher_id);
        if(!empty($getAlreadyFirst)){
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success','Subject Successfully Asign to Class');
        }
        else
        {
            $model = AssignClassTeacherModel::getSingle($id);
            $model->class_id = $request->class_id;
            $model->teacher_id = $request->teacher_id;
            $model->status = $request->status;
            $model->save();
            return redirect('admin/assign_class_teacher/list')->with('success','Assign Class to Teacher Successfully updated');
        }   

    }


    public function delete($id)
    {
        $model = AssignClassTeacherModel::getSingle($id);
        $model->delete();

        return redirect('admin/assign_class_teacher/list')->with('success','Assign Class to Teacher Successfully deleted');


    }


    public function MyClassSubject()
    {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = 'My Class & Subject';
        return view('teacher.my_class_subject',$data);

    }


}
