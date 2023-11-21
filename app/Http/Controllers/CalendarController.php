<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\ExamScheduleModel;
use App\Models\User;
use Auth;

class CalendarController extends Controller
{
    //

    public function MyCalendar()
    {
        $data['getMyTimeTable'] = $this->getTimetable(Auth::user()->class_id);
        $data['getExamTimeTable'] = $this->getExamTimetable(Auth::user()->class_id);
       
        $data['header_title'] = "My Calendar";
        return view('student.my_calendar',$data);
    }

    public function getExamTimetable($class_id)
    {
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = [];

        foreach($getExam as $value)
        {
            $dataE = [];
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id,$class_id);
            $resultS = [];
            foreach($getExamTimetable as $valueS)
            {
                $dataS = [];
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->passing_mark;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }

            $dataE['exam'] = $resultS;
            $result[]=$dataE;
       
        }

        return $result;
    }

    public function getTimetable($class_id)
    {
       
        $getRecord = ClassSubjectModel::MySubject($class_id);
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
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;

                $classSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id,$value->subject_id,$valueW->id);
                if(!empty($classSubject)){
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

                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }

       
        return $result;
    }


    public function MyCalendarParent($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getStudent'] = $getStudent;
        $data['getMyTimeTable'] = $this->getTimetable($getStudent->class_id);
        $data['getExamTimeTable'] = $this->getExamTimetable($getStudent->class_id);
       
        $data['header_title'] = "Student Calendar";
        return view('parent.my_calendar',$data); 

    }
}
