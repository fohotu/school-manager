<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use Auth;

class SubjectController extends Controller
{
    public function list()
    {

        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view("admin.subject.list",$data);

    }

    public function add()
    {
        $data['header_title'] = "Add New Subject";
        return view("admin.subject.add",$data);

    }

    public function insert(Request $request)
    {
        $model = new SubjectModel;
        $model->name=trim($request->name);
        $model->status=trim($request->status);
        $model->type=trim($request->type);
        $model->created_by = Auth::user()->id;
        $model->is_delete = 0;
        $model->save();
     
        return redirect('admin/subject/list')->with('success','Subject successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        $data['header_title'] = "Edit Class";
        return view("admin.subject.edit",$data);
    }

    public function update(Request $request,$id)
    {
        $model = SubjectModel::getSingle($id);
        $model->name = $request->name;
        $model->status = $request->status;
        $model->type=$request->type;
        $model->save();

        return redirect('admin/subject/list')->with('success','Subject successfully updated');

    }

    public function delete($id)
    {
        $model = SubjectModel::getSingle($id);
        $model->is_delete = 1;
        $model->save();
        return redirect('admin/subject/list')->with('success','Subject successfully deleted');
    }
}
