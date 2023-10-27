<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';


    public static function getRecord()
    {
        $model = self::select('subject.*')
      
        ->where('is_delete','=',0);

        if(!empty(Request::get('name'))){
            $model = $model->where('name','like','%'.Request::get('name').'%');
         }
 
         if(!empty(Request::get('date'))){
             $model = $model->whereDate('subject.created_at','=',Request::get('created_date'));
         }

         if(!empty(Request::get('type'))){
            $model = $model->where('type','=',Request::get('type'));
        }
         //


        $model = $model->orderBy('id','desc')
        ->paginate(10);

        return $model;
    }


    public static function getSingle($id)
    {
        return self::where('id','=',$id)->first();
    }

}
