<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Hr\Promotion;
use App\Models\Settings\Designation;
use App\Models\Employee\Employee_information;
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,string $slug)
    {
        $designations = Designation::get()->all();
        $employee = "";

        if($slug == 'new'){
            if($request->isMethod('post')){
                $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
                if($employee){
                $promotion = Promotion::where('user_id',$employee->id)->orderBy('promotion_date','DESC')->get()->first();
                //dd($promotion);
                return view('hr.promotion.newpromotion')->with(compact('employee','promotion','designations'));
                }
                else{
                    return redirect(route('promotion.create','new'))->with('error','Invalid Employee ID');
                }
                
            }
            return view('hr.promotion.newpromotion')->with(compact('employee'));
        }
        else{
            if($request->isMethod('post')){
                $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
                if($employee){
                $promotion = Promotion::where('user_id',$employee->id)->orderBy('promotion_date','DESC')->get()->first();
                //dd($promotion);
                return view('hr.promotion.addprevpromotion')->with(compact('employee','promotion','designations'));
                }
                else{
                    return redirect(route('promotion.create','previous'))->with('error','Invalid Employee ID');
                }
                
            }
            return view('hr.promotion.addprevpromotion')->with(compact('employee'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        if($slug == 'new'){
            $promotion = new Promotion();
            $promotion->user_id = $request->user_id;
            $promotion->promotion_date = $request->promotion_date;
            $promotion->previous_designation = $request->previous_designation;
            $promotion->current_designation = $request->current_designation;
            $promotion->status = 'New';
            $promotion->save();

            // $employee_info = Employee_information::where('user_id',$request->user_id)->get()->first();
            // $employee_info->designation_id = $request->current_designation;
            // $employee_info->update();
            return redirect(route('promotion.create','new'))->with('success','Promotion Request Successfully!');
        }
        elseif($slug == 'previous'){
            foreach( $request['promotion-history'] as $promotion){
                $prev_promotion = new Promotion();
                $prev_promotion->user_id = $request->user_id;
                $prev_promotion->promotion_date = $promotion['promotion_date'];
                $prev_promotion->previous_designation = $promotion['previous_designation'];
                $prev_promotion->current_designation = $promotion['current_designation'];
                $prev_promotion->status = 'Approved';
                $prev_promotion->approved_by = Auth::user()->id;
                $prev_promotion->save();
                }
                return redirect(route('promotion.create','previous'))->with('success','Prevoius Promotion History Create Successfully!');
        }
    }


    public function promotion_history(Request $request){
        $employee = "";
        if($request->isMethod('post')){
            $employee = Employee_information::with('designation')->where('employee_id',$request->employee_id)->get()->first();
            if($employee){
            $promotions = Promotion::with('previous','next','approved')->where('user_id',$employee->id)->where('status','Approved')->orderBy('promotion_date','DESC')->get()->all();
            //dd($promotions);
            return view('hr.promotion.history')->with(compact('employee','promotions'));
            }
            else{
                return redirect(route('promotion.history'))->with('error','Invalid Employee ID');
            }
            
        }
        return view('hr.promotion.history')->with(compact('employee'));
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
