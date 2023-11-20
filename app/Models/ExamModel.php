<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class ExamModel extends Model
{
    use HasFactory;

    protected $table = 'exam';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord1()
    {   
        
        $model =  self::select('exam.*','users.name as created_name')
        ->join('users','users.id','=','exam.created_by');

        if(!empty(Request::get('name')))
        {
            $model = $model->where('exam.name','like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('date')))
        {
            $model = $model->whereDate('exam.created_at','=',Request::get('date'));
        }

        $model = $model->where('exam.is_delete','=',0);
        $model->orderBy('exam.id','desc')
        ->paginate(50);

        return $model;

    }


    public static function getRecord()
    {
        

        $model = self::select('exam.*','users.name as created_name')
        ->join('users','users.id','=','exam.created_by');

       /*

        if(!empty(Request::get('name'))){
            $model = $model->where('exam.name','like','%'.Request::get('name').'%');
        }
 
         if(!empty(Request::get('date'))){
             $model = $model->whereDate('exam.created_at','=',Request::get('date'));
         }

         */
        

   

        $model =  $model->where('exam.is_delete','=',0);
        $model = $model->orderBy('exam.id','desc')
        ->paginate(10);


       

        return $model;
    }


    public static function getExam()
    {
        $model = self::select('exam.*')
        ->join('users','users.id','=','exam.created_by')
        ->where('exam.is_delete','=',0)
        ->orderBy('exam.name','desc')
        ->get();

        return $model;
    }
}
