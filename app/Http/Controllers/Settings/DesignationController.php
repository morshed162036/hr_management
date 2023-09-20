<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Designation;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::get()->all();
        return view('settings.designation.index')->with(compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.designation.create');
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

        $designation = new Designation();
        $designation->title = $request->title;
        $designation->description = $request->description;
        $designation->save();
        return redirect(route('designation.index'))->with('success','New Designation Save Successfully!');
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
        $designation = Designation::where('id',$id)->first();
        return view('settings.designation.edit')->with(compact('designation'));
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

        $designation = Designation::findorFail($id);
        $designation->title = $request->title;
        $designation->description = $request->description;
        $designation->update();
        return redirect(route('designation.index'))->with('success','Designation Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Designation::findorFail($id)->delete();
        return redirect(route('designation.index'))->with('success','Designation Delete Successfully!');
    }
}
