<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Loan_application;
use App\Models\Hr\Loan;
use App\Models\Employee\Employee_information;
class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Loan_application::with('employee','loan','approved')->get()->all();
        //dd($applications);
        return view('hr.loan.application.index')->with(compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $loans = Loan::get()->all();
        $employee = "";
        if($request->isMethod('post')){
            $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
            if($employee){
            return view('hr.loan.application.create')->with(compact('employee','loans'));
            }
            else{
                return redirect(route('loan-application.create'))->with('error','Invalid Employee ID');
            }
            
        }
        return view('hr.loan.application.create')->with(compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'loan_id'=>'required',
            'loan_amount'=>'required',
            'total_month'=>'required',
            'installment_amount'=>'required',
            'loan_id'=>'required',
            ];
        $this->validate($request,$rules);
        $application = new Loan_application();
        $application->user_id = $request->user_id;
        $application->loan_id = $request->load_id;
        $application->loan_amount = $request->loan_amount;
        $application->total_month = $request->total_month;
        $application->remaining_month = $request->total_month;
        $application->installment_amount = $request->installment_amount;
        $application->activation_date = $request->activation_date;
        $application->remarks = $request->remarks;
        $application->save();
        return redirect(route('loan-application.index'))->with('success','New Loan Application Create Successfully!');
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
