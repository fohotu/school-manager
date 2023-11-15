<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;


class ClassTimetableController extends Controller
{
    
    public function list(Request $request)
    {
        
        $data['header_title'] = "Class Timetable list";
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->class_id))
        {
            $data['getSubject'] = ClassSubjectModel::MySubject($request->class_id);
        }

        return view('admin.class_timetable.list',$data);

    }


    public function get_subject(Request $request)
    {

        $getSubject = ClassSubjectModel::MySubject($request->class_id);
        $html = "<option value=''>Select</option>";
        foreach($getSubject as $value)
        {
            $html .= "<option value='>".$value->subject_id."'>".$value->subject_name."</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);

      
    }


}
