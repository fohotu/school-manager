<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';

    public static function getRecord()
    {
            $model = self::select('assign_class_teacher.*','class.name as class_name','teacher.name as teacher_name','users.name as created_by_name')
            ->join('users as teacher','teacher.id','=','assign_class_teacher.teacher_id')
            ->join('class','class.id','=','assign_class_teacher.class_id')
            ->join('users','users.id','=','assign_class_teacher.created_by')
            ->where('assign_class_teacher.is_delete','=',0);

            
            if(!empty(Request::get('class_name'))){
                $model = $model->where('class.name','like','%'.Request::get('class_name').'%');
            }
    
            if(!empty(Request::get('teacher_name'))){
                $model = $model->where('teacher.name','like','%'.Request::get('teacher_name').'%');
            }

            if(!empty(Request::get('status'))){
                $status = (Request::get('status')==100) ? 0 : 1;
                $model = $model->where('assign_class_teacher.status','=',$status);
            }
    
            if(!empty(Request::get('date'))){
                $model = $model->whereDate('assign_class_teacher.created_at','=',Request::get('date'));
            }

            $model = $model->orderBy('assign_class_teacher.id','desc')
            ->paginate(100);
            
            return $model;

    }


    public static function getAlreadyFirst($class_id,$teacher_id){
        return self::where('class_id','=',$class_id)
        ->where('teacher_id','=',$teacher_id)
        ->first();
    }


    public static function getAssignTeacherID($class_id)
    {
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();
    }


    public static function getSingle($id)
    {
        return self::where('id','=',$id)->first();
    }

    public static function deleteTeacher($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }

    public static function getMyClassSubject($teacher_id)
    {
        $model = self::select('assign_class_teacher.*','class.name as class_name',
        'subject.name as subject_name','subject.type as subject_type','class.id as class_id','subject.id as subject_id')
                ->join('class','class.id','=','assign_class_teacher.class_id')
                ->join('class_subject','class_subject.class_id','=','class.id')
                ->join('subject','subject.id','=','class_subject.subject_id')
                ->where('assign_class_teacher.is_delete','=',0)
                ->where('assign_class_teacher.status','=',0)
                ->where('subject.status','=',0)
                ->where('subject.is_delete','=',0)
                ->where('class_subject.status','=',0)
                ->where('class_subject.is_delete','=',0)
                ->where('assign_class_teacher.teacher_id','=',$teacher_id)
                ->get();

        return $model;        
    }

    public static function getMyTimeTable($class_id,$subject_id)
    {
        $getWeek = WeekModel::getWeekUseingName(date('1'));

        return ClassSubjectTimetableModel::getRecordClassSubject($class_id,$subject_id,$getWeek->id);

    }


}
