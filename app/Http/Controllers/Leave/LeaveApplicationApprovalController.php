<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Leave\Leave;
use App\Models\Leave\Leave_application;
class LeaveApplicationApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Leave_application::with('employee','leaves','applied_by','approved')->where('status','New')->get()->all();
        //dd($applications);
        return view('leave.application.approvalindex')->with(compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $application = Leave_application::with('employee','leaves')->findorFail($id);
        return view('leave.application.approvaledit')->with(compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'status'=>'required'
            ];
        $this->validate($request,$rules);

        $application = Leave_application::findorFail($id);

        $application->status = $request->status;
        $application->approved_by = Auth::user()->id;
        $application->update();
        return redirect(route('leave-application-approval.index'))->with('success','Change Approval Status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
