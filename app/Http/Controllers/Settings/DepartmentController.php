<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::get()->all();
        return view('settings.department.index')->with(compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            ];
        $this->validate($request,$rules);

        $department = new Department();
        $department->title = $request->title;
        $department->description = $request->description;
        $department->save();
        return redirect(route('department.index'))->with('success','New Department Save Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::where('id',$id)->first();
        return view('settings.department.edit')->with(compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            ];
        $this->validate($request,$rules);

        $department = Department::findorFail($id);
        $department->title = $request->title;
        $department->description = $request->description;
        $department->update();
        return redirect(route('department.index'))->with('success','Department Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::findorFail($id)->delete();
        return redirect(route('department.index'))->with('success','Department Delete Successfully!');
    }
}
