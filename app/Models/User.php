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
        $model =  self::select('users.*')
        ->where('user_type','=',3)
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

}
