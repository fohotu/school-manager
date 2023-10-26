<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function list()
    {
        $data['header_title'] = "Class List";
        return view("admin.class.list",$data);
    }
}
