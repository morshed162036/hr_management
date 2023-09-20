<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Section;
use App\Models\Settings\Department;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('department')->get()->all();
        return view('settings.section.index')->with(compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'department_id'=>'required',
            ];
        $this->validate($request,$rules);

        $section = new Section();
        $section->title = $request->title;
        $section->description = $request->description;
        $section->save();
        return redirect(route('section.index'))->with('success','New Section Save Successfully!');
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
        $departments = Department::get()->all();
        $section = Section::where('id',$id)->first();
        return view('settings.section.edit')->with(compact('departments','section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            'department_id'=>'required',
            ];
        $this->validate($request,$rules);

        $section = Section::findorFail($id);
        $section->title = $request->title;
        $section->description = $request->description;
        $section->update();
        return redirect(route('section.index'))->with('success','Section Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Section::findorFail($id)->delete();
        return redirect(route('section.index'))->with('success','Section Delete Successfully!');
    }
}
