<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\WeekModel;
use App\Models\User;
use App\Models\ClassSubjectTimetableModel;
use App\Models\SubjectModel;
use App\Models\ExamScheduleModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Auth;


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

        $getWeek = WeekModel::getRecord();
        $week = [];

        foreach($getWeek as $value){
            
            $dataW = [];
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;
          
            if(!empty($request->class_id) && !empty($request->subject_id))
            {
                $classSubject = ClassSubjectTimetableModel::getRecordClassSubject($request->class_id,$request->subject_id,$value->id);
                if(!empty($classSubject))
                {
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['end_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
            }   
            else
            {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }

            $week[] = $dataW;

        }

        $data['week'] = $week;

        return view('admin.class_timetable.list',$data);

    }


    public function get_subject(Request $request)
    {

        $getSubject = ClassSubjectModel::MySubject($request->class_id);
        $html = "<option value=''>Select</option>";
        foreach($getSubject as $value)
        {
            $html .= "<option value='".$value->subject_id."'>".$value->subject_name."</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);
      
    }


    public function insert_update(Request $request)
    {

       ClassSubjectTimetableModel::where('class_id','=',$request->class_id)
       ->where('subject_id','=',$request->subject_id)->delete();
       $data = [];
        foreach($request->timetable as $key=>$timetable)
        {
            if(
                !empty($timetable['week_id']) && !empty($timetable['start_time']) 
                && !empty($timetable['end_time']) && !empty($timetable['room_number'])
            )
            {

        
                $timetable['class_id'] = $request->class_id;    
                $timetable['subject_id'] = $request->subject_id;  
                //https://stackoverflow.com/questions/32719972/how-to-get-current-timestamp-from-carbon-in-laravel-5
                $timetable['created_at'] = Carbon::now()->toDateTimeString();  
                $timetable['updated_at'] = Carbon::now()->toDateTimeString();  
                $data [$key] = $timetable;
                
            }

            
        }
        if(!empty($data)){
            DB::table('class_subject_timetable')->insert($data);
            return redirect()->back()->with('success','Class Timetable Successfully Saved');
        }
    }



    public function MyTimetable()
    {
        $getRecord = ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = 'My Timetable';
        $result = [];

        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;
            $getWeek = WeekModel::getRecord();
            $week = [];
            foreach($getWeek as $valueW)
            {
                $dataW = [];
                $dataW['week_name'] = $valueW->name;

                $classSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id,$value->subject_id,$valueW->id);
                if(!empty($classSubject)){
                    $dataW['start_time'] = $classSubject->start_time;
                    $dataW['start_time'] = $classSubject->end_time;
                    $dataW['room_number'] = $classSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['start_time'] = '';
                    $dataW['room_number'] = '';
                }

                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }

      //  dd($result);

        $data['getRecord'] = $result;
        return view('student.my_timetable',$data);
    }


    public function MyTimetableTeacher($class_id,$subject_id)
    {
        
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getsingle($subject_id);

        $getWeek = WeekModel::getRecord();
        $week = [];
        foreach($getWeek as $valueW)
        {
            $dataW = [];
            $dataW['week_name'] = $valueW->name;

            $classSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id,$subject_id,$valueW->id);
            
            if(!empty($classSubject))
            {
                $dataW['start_time'] = $classSubject->start_time;
                $dataW['end_time'] = $classSubject->end_time;
                $dataW['room_number'] = $classSubject->room_number;
            }
            else
            {

                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }
            $result[] = $dataW;
        }

        
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";

        return view("teacher.my_timetable",$data);

    }


    public function MyTimetableParent($class_id,$subject_id,$student_id)
    {
        
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getsingle($subject_id);
        $data['getStudent'] = User::getSingle($student_id);

        $getWeek = WeekModel::getRecord();
        $week = [];
        foreach($getWeek as $valueW)
        {
            $dataW = [];
            $dataW['week_name'] = $valueW->name;

            $classSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id,$subject_id,$valueW->id);
            
            if(!empty($classSubject))
            {
                $dataW['start_time'] = $classSubject->start_time;
                $dataW['end_time'] = $classSubject->end_time;
                $dataW['room_number'] = $classSubject->room_number;
            }
            else
            {

                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }
            $result[] = $dataW;
        }

        
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";

        return view("parent.my_timetable",$data);

    }


   

}
