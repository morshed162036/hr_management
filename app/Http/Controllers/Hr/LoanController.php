<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Loan;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::get()->all();
        return view('hr.loan.type.index')->with(compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hr.loan.type.create');
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
        $loan = new Loan();
        $loan->title = $request->title;
        $loan->description = $request->description;
        $loan->save();
        return redirect(route('loan.index'))->with('success','New Loan Type Create Successfully!');
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
        $loan = Loan::where('id',$id)->get()->first();
        return view('hr.loan.type.edit')->with(compact('loan'));
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
        $loan = Loan::findorFail($id);
        $loan->title = $request->title;
        $loan->description = $request->description;
        $loan->update();
        return redirect(route('loan.index'))->with('success','Loan Type Update Successfully!');
    }
    
    public function updateLoanStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Loan::where('id',$data['loan_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'loan_id'=> $data['loan_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Loan::findorFail($id)->delete();
        return redirect(route('loan.index'))->with('success','Loan Type Delete Successfully!');
    }
}
