<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave\Holiday;
use Auth;
class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::where('year',date('Y'))->get()->all();
        //dd($holidays);
        return view('leave.holiday.index')->with(compact('holidays'));
    }

    public function year(Request $request){
        $holidays = Holiday::where('year',$request->year)->get()->all();
        return view('leave.holiday.index')->with(compact('holidays'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'year'=>'required'
            ];
        $this->validate($request,$rules);

        foreach( $request['group-holiday'] as $holidays){
        $holiday = new Holiday();
        $holiday->title = $holidays['title'];
        $holiday->year = $request->year;
        $holiday->holiday_date = $holidays['holiday_date'];
        $holiday->holiday_type = $holidays['holiday_type'];
        $holiday->description = $holidays['description'];
        $holiday->created_by = Auth::user()->id;
        $holiday->save();
        }
        return redirect(route('leave-holidays.index'))->with('success','New holidays Create Successfully!');
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
        $holiday = Holiday::where('id',$id)->get()->first();
        return view('leave.holiday.edit')->with(compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'year'=>'required',
            'title'=>'required',
            'holiday_date'=>'required',
            'holiday_type'=>'required'
            ];
        $this->validate($request,$rules);

        $holiday = Holiday::findorFail($id);
        $holiday->title = $request->title;
        $holiday->year = $request->year;
        $holiday->holiday_date = $request->holiday_date;
        $holiday->holiday_type = $request->holiday_type;
        $holiday->description = $request->description;
        $holiday->update();
        return redirect(route('leave-holidays.index'))->with('success','Holiday Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Holiday::findorFail($id)->delete();
        return redirect(route('leave-holidays.index'))->with('success','Holiday Delete Successfully!');
    }
}
