<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;


class AssingClassTeacherController extends Controller
{
    //

    public function list()
    {

        $data['header_title'] = "Assing Class Teacher";

        return view('admin.assing_class_teacher.list',$data);

    }


    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Add Assing Class Teacher";
        return view("admin.assing_class_teacher.add",$data);

    }


    public function insert(Request $request)
    {
        dd($request->all());
    }




}
