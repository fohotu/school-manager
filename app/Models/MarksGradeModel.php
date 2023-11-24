<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGradeModel extends Model
{
    use HasFactory;

    protected $table = 'marks_grade';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        return self::select('marks_grade.*','users.name as created_name')
            ->join('users','users.id','=','marks_grade.created_by')
            ->get();
    }


    public static function getGrade($percent)
    {
        $model =  self::select('marks_grade.*')
        ->where('percent_from','<=', $percent)
        ->where('percent_to','>=',$percent)
        ->first();

        return !empty($model->name) ? $model->name : '';
    
    }
}
