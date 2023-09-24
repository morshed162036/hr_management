<?php

namespace App\Http\Controllers\Leave;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Employee_information;
use App\Models\Leave\Leave;
use App\Models\Leave\Leave_application;
class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Leave_application::with('employee','leaves','applied_by','approved')->get()->all();
        //dd($applications);
        return view('leave.application.index')->with(compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaves = Leave::get()->all();
        return view('leave.application.create')->with(compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'employee_id'=>'required',
            'leave_id'=>'required',
            'from'=>'required',
            'to'=>'required',
            'days'=>'required',
            'reason'=>'required',
            ];
        $this->validate($request,$rules);
        $user = Employee_information::where('employee_id',$request->employee_id)->get()->first();
        if(!$user){
            return redirect(route('leave-application.index'))->with('error','Employee ID Incorrect');
        }
        $application = new Leave_application();
        $application->user_id = $user->id;
        $application->leave_id = $request->leave_id;
        $application->from = $request->from;
        $application->to = $request->to;
        $application->days = $request->days;
        $application->reason = $request->reason;
        $application->type = $request->type;
        $application->applied_by = Auth::user()->id;
        $application->save();
        return redirect(route('leave-application.index'))->with('success','Leave Application Create Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
