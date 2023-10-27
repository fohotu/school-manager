<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Auth;

class ClassController extends Controller
{
    //
    public function list()
    {

        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = "Class List";
        return view("admin.class.list",$data);

    }

    public function add()
    {
        $data['header_title'] = "Add New Class";
        return view("admin.class.add",$data);

    }

    public function insert(Request $request)
    {
        $model = new ClassModel;
        $model->name=$request->name;
        $model->status=$request->status;
        $model->created_by = Auth::user()->id;
        $model->save();
     
        return redirect('admin/class/list')->with('success','Class successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        $data['header_title'] = "Edit Class";
        return view("admin.class.edit",$data);
    }

    public function update(Request $request,$id)
    {
        $model = ClassModel::getSingle($id);
        $model->name = $request->name;
        $model->status = $request->status;
        $model->save();

        return redirect('admin/class/list')->with('success','Class successfully updated');

    }

    public function delete($id)
    {
        $model = ClassModel::getSingle($id);
        $model->is_delete = 1;
        $model->save();
        return redirect('admin/class/list')->with('success','Admin successfully deleted');

    }

    


}
