<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave\Leave;
class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::get()->all();
        return view('leave.leave-type.index')->with(compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave.leave-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'days'=>'required',
            ];
        $this->validate($request,$rules);
        $leave = new Leave();
        $leave->title = $request->title;
        $leave->days = $request->days;
        $leave->description = $request->description;
        $leave->save();
        return redirect(route('leave-type.index'))->with('success','New Leave Type Create Successfully!');
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
        $leave = Leave::where('id',$id)->get()->first();
        return view('leave.leave-type.edit')->with(compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            'days'=>'required',
            ];
        $this->validate($request,$rules);
        $leave = Leave::findorFail($id);
        $leave->title = $request->title;
        $leave->days = $request->days;
        $leave->description = $request->description;
        $leave->update();
        return redirect(route('leave-type.index'))->with('success','Leave Type Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Leave::findorFail($id)->delete();
        return redirect(route('leave-type.index'))->with('success','Leave Type Delete Successfully!');
    }
}
