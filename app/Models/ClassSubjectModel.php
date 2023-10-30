<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class ClassSubjectModel extends Model
{   
    
    use HasFactory;
    protected $table="class_subject";


    public static function getRecord()
    {
        $model = self::select('class_subject.*','class.name as class_name','subject.name as subject_name','users.name as created_by_name')
        ->join('subject','subject.id','=','class_subject.subject_id')
        ->join('class','class.id','=','class_subject.class_id')
        ->join('users','users.id','=','class_subject.created_by')
        ->where('class_subject.is_delete','=',0);
       
        if(!empty(Request::get('class_name'))){
            $model = $model->where('class.name','like','%'.Request::get('class_name').'%');
        }

        if(!empty(Request::get('subject_name'))){
            $model = $model->where('subject.subject_name','like','%'.Request::get('subject_name').'%');
        }

        if(!empty(Request::get('date'))){
            $model = $model->whereDate('class_subject.created_at','=',Request::get('date'));
        }
       
        $model=$model->orderBy('class_subject.id','desc')
        ->paginate(20);

        return $model;
    }

    
    public static function getAlreadyFirst($class_id,$subject_id){
        return self::where('class_id','=',$class_id)
        ->where('subject_id','=',$subject_id)
        ->first();
    }

    public static function getAssignSubjectID($class_id)
    {
        return self::where('class_id','=',$class_id)->get();
    }

    public static function getSingle($id)
    {
        return self::where('id','=',$id)->first();
    }


    public static function deleteSubject($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }






}
