<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Auth;
use Hash;

class UserController extends Controller
{
    //

    public function MyAccount()
    {
       
        $data['header_title'] = 'My Acount';
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        if(Auth::user()->user_type==1){
            return view('admin.my_acount',$data);
        }
        else if(Auth::user()->user_type==2){
            return view('teacher.my_acount',$data);
        }
        else if(Auth::user()->user_type==3)
        {
            return view('student.my_acount',$data);
        }
        else if(Auth::user()->user_type==4)
        {
            return view('parent.my_account',$data);
        }
        
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
        $model->email = trim($request->email);
        $model->save();


        return redirect()->back()->with('success','Account Successully Updated');

    }

    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15',
            'blood_group' => 'max:10',
            'caste' => 'max:50',
            'religion'=>'max:50',
            'height' => 'max:10'
        ]);


        $model = User::getSingle($id);
        

        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->gender = trim($request->gender);
       

     
     
        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
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
        $model->caste = trim($request->caste);
        $model->blood_group = trim($request->blood_group);
        $model->height = trim($request->height);
        $model->weight = trim($request->weight);
        $model->email = trim($request->email);
        $model->save();


        return redirect()->back()->with('success','Account Successully Updated');
    }


    public function UpdateMyAccountParent(Request $request)
    {

        $id = Auth::user()->id;

        $request->validateWithBag('student',[
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15',
         ]);


        $model = User::getSingle($id);
        

        $model->name = trim($request->first_name);
        $model->first_name = trim($request->first_name);
        $model->last_name = trim($request->last_name);
        $model->gender = trim($request->gender);
        $model->occupation = trim($request->occupation);
        $model->address = trim($request->address);
     
        if(!empty($request->date_of_birth)){
            $model->date_of_birth = trim($request->date_of_birth);
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
     
        $model->email = trim($request->email);
        $model->save();

        return redirect()->back()->with('success','Account Successully Updated');
    }

    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' =>'required|email|unique:users,email,'.$id
        ]);

        $model = User::getSingle($id);
        $model->name = trim($request->name);
        $model->email = trim($request->email);
        $model->save();
        return redirect()->back()->with('success','Account Successully Updated');

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
