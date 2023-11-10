<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //

    public function MyAccount()
    {
        $data['header_title'] = 'My Acount';
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        return view('teacher.my_acount',$data);
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15',
            'martial_status' => 'max:50',
        ]);


        $model = User::getSingle($id);
        

        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->gender = trim($request->gender);
       

        $model->address = trim($request->current_address);
        $model->qualification = trim($request->qualification);
        $model->work_experience = trim($request->work_experience);
        $model->note = trim($request->note);
        $model->martial_status = trim($request->martial_status);
        $model->permanent_address = trim($request->permanent_address);

        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->date_of_joining)){
            $model->date_of_joining = trim($request->date_of_joining);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $model->profile_photo = $filename;
        }

   
     
        $model->mobile_number = trim($request->mobile_number);
        $model->status = trim($request->status);
        $model->email = trim($request->email);



        $model->save();
    }

    public function changePassword()
    {
        $data['header_title'] = "Change Password";
        return view("profile.change_password",$data);
    }

    public function updatePassword(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password))
        {   
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success','Password successfully updated');
        }
        else
        {
            return redirect()->back()->with('error','Old password is not correct');

        }
    }
}
