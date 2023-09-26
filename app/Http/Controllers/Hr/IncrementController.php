<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Hr\Increment;
use App\Models\Settings\Grade;
use App\Models\Employee\Employee_information;
class IncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $increments = Increment::with('employee','previous','next')->where('status','New')->get()->all();
        //dd($increments);
        return view('hr.increment.approvallist')->with(compact('increments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,string $slug)
    {
        $grades = Grade::get()->all();
        $employee = "";

        if($slug == 'new'){
            if($request->isMethod('post')){
                $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
                if($employee){
                $increment = Increment::where('user_id',$employee->id)->orderBy('increment_date','DESC')->get()->first();
                //dd($increment);
                return view('hr.increment.newincrement')->with(compact('employee','increment','grades'));
                }
                else{
                    return redirect(route('increment.create','new'))->with('error','Invalid Employee ID');
                }
                
            }
            return view('hr.increment.newincrement')->with(compact('employee'));
        }
        else{
            if($request->isMethod('post')){
                $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
                if($employee){
                $increment = Increment::where('user_id',$employee->id)->orderBy('increment_date','DESC')->get()->first();
                //dd($increment);
                return view('hr.increment.addprevincrement')->with(compact('employee','increment','grades'));
                }
                else{
                    return redirect(route('increment.create','previous'))->with('error','Invalid Employee ID');
                }
                
            }
            return view('hr.increment.addprevincrement')->with(compact('employee'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        if($slug == 'new'){
            $increment = new Increment();
            $increment->user_id = $request->user_id;
            $increment->increment_date = $request->increment_date;
            $increment->previous_grade = $request->previous_grade;
            $increment->current_grade = $request->current_grade;
            $increment->status = 'New';
            $increment->save();
            
            return redirect(route('increment.create','new'))->with('success','Increment Request Successfully!');
        }
        elseif($slug == 'previous'){
            foreach( $request['increment-history'] as $increment){
                $prev_increment = new Increment();
                $prev_increment->user_id = $request->user_id;
                $prev_increment->increment_date = $increment['increment_date'];
                $prev_increment->previous_grade = $increment['previous_grade'];
                $prev_increment->current_grade = $increment['current_grade'];
                $prev_increment->status = 'Approved';
                $prev_increment->approved_by = Auth::user()->id;
                $prev_increment->save();
                }
                return redirect(route('increment.create','previous'))->with('success','Prevoius Increment History Create Successfully!');
        }
        
    }

    public function increment_history(Request $request){
        $employee = "";
        if($request->isMethod('post')){
            $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
            if($employee){
            $increments = Increment::with('previous','next','approved')->where('user_id',$employee->id)->where('status','Approved')->orderBy('increment_date','DESC')->get()->all();
            //dd($increments);
            return view('hr.increment.history')->with(compact('employee','increments'));
            }
            else{
                return redirect(route('increment.history'))->with('error','Invalid Employee ID');
            }
            
        }
        return view('hr.increment.history')->with(compact('employee'));
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
    public function update(Request $request,string $slug, string $id)
    {
        $increment = Increment::findorFail($id);
        $increment->status = $slug;
        $increment->approved_by = Auth::user()->id;
        
        if($slug = 'Approved'){
            $employee_info = Employee_information::where('user_id',$increment->user_id)->get()->first();
            $employee_info->grade_id = $increment->current_grade;
            $employee_info->update();
        }
        $increment->update();
        return redirect(route('increment.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
