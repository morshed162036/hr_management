<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Grade;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::get()->all();
        return view('settings.grade.index')->with(compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.grade.create');
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

        $grade = new Grade();
        $grade->title = $request->title;
        $grade->description = $request->description;
        $grade->save();
        return redirect(route('grade.index'))->with('success','New Grade Save Successfully!');
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
        $grade = Grade::where('id',$id)->first();
        return view('settings.grade.edit')->with(compact('grade'));
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

        $grade = Grade::findorFail($id);
        $grade->title = $request->title;
        $grade->description = $request->description;
        $grade->update();
        return redirect(route('grade.index'))->with('success','Grade Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        grade::findorFail($id)->delete();
        return redirect(route('grade.index'))->with('success','Grade Delete Successfully!');
    }
}
