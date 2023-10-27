<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';


    public static function getRecord()
    {
        $model = self::select('class.*','users.name as created_by_name')
      
        ->join('users','users.id','class.created_by')
        ->where('class.is_delete','=',0);

        if(!empty(Request::get('name'))){
            $model = $model->where('class.name','like','%'.Request::get('name').'%');
         }
 
         if(!empty(Request::get('date'))){
             $model = $model->where('class.created_at','=',Request::get('created_date'));
         }


        $model = $model->orderBy('class.id','desc')
        ->paginate(10);

        return $model;
    }


    public static function getSingle($id)
    {
        return self::where('id','=',$id)->first();
    }
   
}
