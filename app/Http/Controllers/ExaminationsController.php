<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Auth;

class ExaminationsController extends Controller
{
    //

    public function examList()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam list";
        return view('admin.examinations.exam.list',$data);
    }

    public function examAdd()
    {
        $data['header_title'] = 'Add New Exam';
        return view('admin.examinations.exam.add',$data);
    } 

    public function examInsert(Request $request)
    {
        
        $model = new ExamModel;
        $model->name = trim($request->name);
        $model->note = trim($request->note);
        $model->created_by = Auth::user()->id;
        $model->save();

        return redirect('exmaniations/exam/list')->with('success','Exam successufully created');

    }

    public function examEdit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Exit Exam";
            return view('admin.examinations.exam.edit',$data);
        }
        else
        {
            abort(404);
        }
    }


    public function examUpdate($id,Request $request)
    {
        $model = ExamModel::getSingle($id);
        $model->name = trim($request->name);
        $model->note = trim($request->note);
        $model->save();

        return redirect('admin/exmaniations/exam/list')->with('success','Exam successufully updated');

    }


    public function examDelete($id)
    {
        
        $model = ExamModel::getSingle($id);
        if(!empty($model))
        {
            $model->is_delete = 1;
            $model->save();

            return redirect()->back()->with('success','Exam successufully deleted');

        }
        else
        {
            abort(404);
        }

    }


    public function examSchedule(Request $request)
    {
        $data['header_title'] = 'Exam Schedule';
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        $result = [];
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            
           
            foreach($getSubject as $value)
            {
                $dataS = [];
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $examSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'),$request->get('class_id'),$value->subject_id);

                if(!empty($examSchedule))
                {
                    $dataS['exam_date'] = $examSchedule->exam_date;
                    $dataS['start_time'] = $examSchedule->start_time;
                    $dataS['end_time'] = $examSchedule->end_time;
                    $dataS['room_number'] = $examSchedule->room_number;
                    $dataS['full_marks'] = $examSchedule->full_marks;
                    $dataS['passing_mark'] = $examSchedule->passing_mark;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = '';
                }

                $result[] = $dataS;

            }
        }

        $data['getRecord'] = $result;
        
        return view('admin.examinations.exam_schedule',$data);
    }


    public function examScheduleInsert(Request $request)
    {   
       //dd($request);
        ExamScheduleModel::deleteRecord($request->exam_id,$request->class_id);

        if(!empty($request->schedule))
        {
            foreach($request->schedule as $schedule)
            {
                
                if(
                    !empty($schedule['subject_id']) && !empty($schedule['exam_date'])
                    && !empty($schedule['start_time']) && !empty($schedule['end_time'])
                    && !empty($schedule['room_number']) && !empty($schedule['full_marks'])
                    && !empty($schedule['passing_mark'])
                )
                {

                    $model = new ExamScheduleModel;
                    $model->exam_id = $request->exam_id;
                    $model->class_id = $request->class_id;
                    $model->subject_id = $schedule['subject_id'];
                    $model->exam_date = $schedule['exam_date'];
                    $model->start_time = $schedule['start_time'];
                    $model->end_time = $schedule['end_time'];
                    $model->room_number = $schedule['room_number'];
                    $model->full_marks = $schedule['full_marks'];
                    $model->passing_mark = $schedule['passing_mark'];
                    $model->created_by = Auth::user()->id;
                    $model->save();

                }
            
            }
        }  
        
        return redirect()->back()->with('success','Exam Schedule successufully saved');

    }


    public function MyExamTimetable(Request $request)
    {
        
        $class_id = Auth::user()->class_id;
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

        $data['getRecord'] = $result;

        $data['header_title'] = 'My Exam Timetable';
        
        return view('student.my_exam_timetable',$data);


    }


    public function MyExamTimetableTeacher()
    {
        $result = [];
        $getClass = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        
        foreach($getClass as $class)
        {
            $dataC = [];
            $dataC['class_name'] = $class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = [];

            foreach($getExam as $exam)
            {
                $dataE = [];
                $dataE['exam_name'] = $exam->exam_name;

                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id,$class->class_id);
                $subjectArray = [];
                foreach($getExamTimetable as $valueS)
                {
                    $dataS = [];
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['room_number'] = $valueS->room_number;
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_mark'] = $valueS->passing_mark;
                    $subjectArray[] = $dataS;
                }

                $dataE['subject'] = $subjectArray;

                $examArray[] = $dataE;
            }

            $dataC['exam'] = $examArray;

            $result[] = $dataC;
        
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Timetable";
        return view('teacher.my_exam_timetable',$data);
    
    }


    public function ParentMyExamTimetable($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $class_id = $getStudent->class_id;
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

        $data['getRecord'] = $result;
        $data['getStudent'] =  $getStudent;

        $data['header_title'] = 'My Exam Timetable';
        
        return view('parent.my_exam_timetable',$data);

    }

}
