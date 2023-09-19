<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Wing;
class WingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wings = Wing::get()->all();
        return view('settings.wing.index')->with(compact('wings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.wing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'wings_title'=>'required',
            ];
        $this->validate($request,$rules);

        $wings = new Wing();
        $wings->title = $request->wings_title;
        $wings->description = $request->wings_description;
        $wings->save();
        return redirect(route('wings.index'))->with('success','New wing Save Successfully!');
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
        $wing = Wing::where('id',$id)->get()->first();
        //dd($brand->id);
        return view('settings.wing.edit')->with(compact('wing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'wings_title'=>'required',
            ];
        $this->validate($request,$rules);

        $wings = Wing::findorFail($id);
        $wings->title = $request->wings_title;
        $wings->description = $request->wings_description;
        $wings->update();
        return redirect(route('wings.index'))->with('success','Wing Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wings = Wing::findorFail($id);
        $wings->delete();
        return redirect(route('wings.index'))->with('success','Wing Delete Successfully!');
    }

    public function updateWingsStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Wing::where('id',$data['wing_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'wing_id'=> $data['wing_id']]);
        }
    }
}
