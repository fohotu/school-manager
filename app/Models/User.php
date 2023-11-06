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
        $model =  self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('user_type','=',3)
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

    public function getProfile()
    {
        if(!empty($this->profile_photo) && file_exists('upload/profile/'.$this->profile_photo)){
            return url('upload/profile/'.$this->profile_photo);
        }
        return '';

    }

}
