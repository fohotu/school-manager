<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getAdmin()
    {
        $model =  self::select('users.*')
        ->where('user_type','=',1)
        ->where('is_delete','=',0);

        if(!empty(Request::get('email'))){
           $model = $model->where('email','like','%'.Request::get('email').'%');
        }

        if(!empty(Request::get('name'))){
            $model = $model->where('name','=','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('date'))){
            $model = $model->where('created_at','=',Request::get('date'));
        }


        $model = $model->orderBy('id','desc')
        ->paginate(20);

        return $model;
    }

    public static function getEmailSingle($email)
    {
        return self::where('email','=',$email)->first();
    }

    public static function getTokenSingle($remember_token)
    {
        return User::where('remember_token','=',$remember_token)->first();
    }

    public static function getSingle($id)
    {
        return self::where('id','=',$id)->first();
    }

    public static function getStudent()
    {
        $model =  self::select('users.*','class.name as class_name','parent.name as parent_name','parent.last_name as parent_last_name')
        ->join('users as parent','parent.id','=','users.parent_id','left')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_delete','=',0);

        if(!empty(Request::get('email'))){
           $model = $model->where('users.email','like','%'.Request::get('email').'%');
        }

        if(!empty(Request::get('name'))){
            $model = $model->where('users.name','like','%'.Request::get('name').'%');
        }


        if(!empty(Request::get('last_name'))){
            $model = $model->where('users.last_name','like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('first_name'))){
            $model = $model->where('users.first_name','like','%'.Request::get('first_name').'%');
        }

        if(!empty(Request::get('admission_number'))){
            $model = $model->where('users.admission_number','like','%'.Request::get('admission_number').'%');
        }


        if(!empty(Request::get('roll_number'))){
            $model = $model->where('users.roll_number','like','%'.Request::get('roll_number').'%');
        }


        if(!empty(Request::get('class'))){
            $model = $model->where('class.name','like','%'.Request::get('class').'%');
        }

        if(!empty(Request::get('gender'))){
            $model = $model->where('users.gender','like','%'.Request::get('gender').'%');
        }

        if(!empty(Request::get('caste'))){
            $model = $model->where('users.caste','like','%'.Request::get('caste').'%');
        }

        if(!empty(Request::get('religion'))){
            $model = $model->where('users.religion','like','%'.Request::get('religion').'%');
        }

        if(!empty(Request::get('mobile_number'))){
            $model = $model->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('blood_group'))){
            $model = $model->where('users.blood_group','like','%'.Request::get('blood_group').'%');
        }


        if(!empty(Request::get('admission_date'))){
            $model = $model->where('users.admission_date','like','%'.Request::get('admission_date').'%');
        }
     

        if(!empty(Request::get('date'))){
            $model = $model->where('created_at','=',Request::get('date'));
        }

        if(!empty(Request::get('status'))){
            $status = (Request::get('status') == 100) ? 0 : 1;
            $model = $model->where('status','=',$status);
        }



        $model = $model->orderBy('id','desc')
        ->paginate(20);

        return $model;
    }

    public function getProfile()
    {
        if(!empty($this->profile_photo) && file_exists('upload/profile/'.$this->profile_photo)){
            return url('upload/profile/'.$this->profile_photo);
        }
        return '';

    }




    public static function getParent()
    {
        $model =  self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('user_type','=',4)
        ->where('users.is_delete','=',0);


        if(!empty(Request::get('email'))){
            $model = $model->where('users.email','like','%'.Request::get('email').'%');
         }

        if(!empty(Request::get('name'))){
            $model = $model->where('name','like','%'.Request::get('name').'%');
        }


        if(!empty(Request::get('last_name'))){
            $model = $model->where('users.last_name','like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('first_name'))){
            $model = $model->where('users.first_name','like','%'.Request::get('first_name').'%');
        }

        if(!empty(Request::get('admission_number'))){
            $model = $model->where('users.admission_number','like','%'.Request::get('admission_number').'%');
        }


        if(!empty(Request::get('roll_number'))){
            $model = $model->where('users.roll_number','like','%'.Request::get('roll_number').'%');
        }


        if(!empty(Request::get('class'))){
            $model = $model->where('class.name','like','%'.Request::get('class').'%');
        }

        if(!empty(Request::get('gender'))){
            $model = $model->where('users.gender','like','%'.Request::get('gender').'%');
        }

        if(!empty(Request::get('caste'))){
            $model = $model->where('users.caste','like','%'.Request::get('caste').'%');
        }

        if(!empty(Request::get('religion'))){
            $model = $model->where('users.religion','like','%'.Request::get('religion').'%');
        }

        if(!empty(Request::get('mobile_number'))){
            $model = $model->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('blood_group'))){
            $model = $model->where('users.blood_group','like','%'.Request::get('blood_group').'%');
        }

        if(!empty(Request::get('admission_date'))){
            $model = $model->where('users.admission_date','like','%'.Request::get('admission_date').'%');
        }

        if(!empty(Request::get('name'))){
            $model = $model->where('name','=','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('date'))){
            $model = $model->where('created_at','=',Request::get('date'));
        }

        if(!empty(Request::get('status'))){
            $status = (Request::get('status') == 100) ? 0 : 1;
            $model = $model->where('status','=',$status);
        }



        $model = $model->orderBy('id','desc')
        ->paginate(20);

        return $model;
    }


    public static function getSearchStudent()
    {

       
        if(!empty(Request::get('id')) ||
         !empty(Request::get('name')) || 
        !empty(Request::get('last_name')) ||
        !empty(Request::get('email'))
        )
        {
         
            var_dump(Request::all());
            $model =  self::select('users.*','class.name as class_name','parent.name as parent_name')
            ->join('users as parent','parent.id','=','users.parent_id','left')
            ->join('class','class.id','=','users.class_id','left')
            ->where('users.user_type','=',3)
            ->where('users.is_delete','=',0);

            if(!empty(Request::get('id'))){
                
                $model = $model->where('users.id','=',Request::get('id'));
            }
    
           
            if(!empty(Request::get('email'))){
                $model = $model->where('users.email','like','%'.Request::get('email').'%');
            }
    
            if(!empty(Request::get('name'))){
                $model = $model->where('users.name','like','%'.Request::get('name').'%');
            }

            if(!empty(Request::get('last_name'))){
                $model = $model->where('users.last_name','like','%'.Request::get('last_name').'%');
            }
          
    
            $model = $model->orderBy('users.id','desc')
            ->limit(50)
            ->get();
         

            return $model;


        }
    }


    public static function getMyStudent($parent_id)
    {
        
        $model = self::select('users.*','class.name as class_name','parent.name as parent_name')
        ->join('users as parent','parent.id','=','users.parent_id')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.parent_id','=',$parent_id)
        ->where('users.is_delete','=',0)
        ->orderBy('users.id','desc')
        ->get();

        return $model;
        
    }





    public static function getTeacher()
    {
        $model =  self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('user_type','=',2)
        ->where('users.is_delete','=',0);


     

        if(!empty(Request::get('email'))){
            $model = $model->where('users.email','like','%'.Request::get('email').'%');
        }

        if(!empty(Request::get('name'))){
            $model = $model->where('name','like','%'.Request::get('name').'%');
        }


        if(!empty(Request::get('last_name'))){
            $model = $model->where('users.last_name','like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('first_name'))){
            $model = $model->where('users.first_name','like','%'.Request::get('first_name').'%');
        }

    

        if(!empty(Request::get('gender'))){
            $model = $model->where('users.gender','like','%'.Request::get('gender').'%');
        }

    


        if(!empty(Request::get('mobile_number'))){
            $model = $model->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('martial_status'))){
            $model = $model->where('users.martial_status','like','%'.Request::get('martial_status').'%');
        }
    
        if(!empty(Request::get('address'))){
            $model = $model->where('users.address','like','%'.Request::get('address').'%');
        }

        if(!empty(Request::get('date'))){
            $model = $model->where('created_at','=',Request::get('date'));
        }

        if(!empty(Request::get('status'))){
            $status = (Request::get('status') == 100) ? 0 : 1;
            $model = $model->where('status','=',$status);
        }
        
    



        $model = $model->orderBy('id','desc')
        ->paginate(20);

        return $model;
    }




    public static function getTeacherClass()
    {
        $model = self::select('users.*')
            ->where('users.user_type','=',2)
            ->where('users.is_delete','=',0);

        $model = $model->orderBy('users.id','desc')
                ->get(20);

         return $model;       

    }

    public static function getTeacherStudent($teacher_id)
    {
        $model = self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id')
        ->join('assign_class_teacher','assign_class_teacher.class_id','=','class.id')
        ->where('assign_class_teacher.teacher_id','=',$teacher_id)
        ->where('users.user_type','=',3)
        ->where('users.is_delete','=',0)
        ->where('assign_class_teacher.is_delete','=',0)
        ->orderBy('users.id','desc')
        ->groupBy('users.id')
        ->paginate(20);

        return $model;
    }



    public static function getStudentClass($class_id)
    {
        $model =  self::select('users.id','users.name','users.last_name')
        ->where('users.user_type','=',3)
        ->where('users.is_delete','=',0)
        ->where('users.class_id','=',$class_id);
        $model = $model->orderBy('users.id','desc')
        ->get();

        return $model;
    }


   

}
