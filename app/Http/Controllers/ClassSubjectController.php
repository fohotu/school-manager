<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use Auth;

class ClassSubjectController extends Controller
{
    //
    public function list(Request $request)
    {
        
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = "Subject Assign List";
        return view('admin.assign_subject.list',$data);

    }

    public function add()
    {
        
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Assign Subject Add';
        return view('admin.assign_subject.add',$data);

    }

    public function insert(Request $request)
    {
        if(!empty($request->subject_id)){
            foreach($request->subject_id as $subject_id){
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id,$subject_id);
                if(!empty($getAlreadyFirst)){
                  $getAlreadyFirst->status = $request->status;
                  $getAlreadyFirst->save();
                }else{

                    $model = new ClassSubjectModel;
                    $model->class_id = $request->class_id;
                    $model->subject_id = $subject_id;
                    $model->status = $request->status;
                    $model->created_by = Auth::user()->id;
                    $model->is_delete = 0;
                    $model->save(); 
                
                }            
            }
            return redirect('admin/asing_subject/list')->with('success','Subject successfully asign to class');
        }else{
            return redirect()->back()->with('error','Subject empty');
        }
    }


    public function delete($id)
    {
        $model =  ClassSubjectModel::getSingle($id);
        $model->is_delete = 1;
        $model->save();

        return redirect()->back()->with('success','Record Successfully deleted');
    
    }


    public function edit($id)
    {

        $getRecord = ClassSubjectModel::getSingle($id);
        
        if(!empty($getRecord))
        {
            
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_subject.edit',$data);

        }
        else
        {
            abort(404);
        }

    }


    public function update(Request $request)
    {
        
        ClassSubjectModel::deleteSubject($request->class_id);


    }

  



}
