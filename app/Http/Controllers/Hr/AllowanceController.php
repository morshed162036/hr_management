<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Hr\Allowance;
class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allowances = Allowance::get()->all();
        //dd($allowances);
        return view('hr.allowance.type.index')->with(compact('allowances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hr.allowance.type.create');
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

        $allowance = new Allowance();
        $allowance->title = $request->title;
        $allowance->description = $request->description;
        $allowance->created_by = Auth::user()->id;
        $allowance->save();
        return redirect(route('allowance.index'))->with('success','New Allowance Create Successfully!');
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
        $allowance = Allowance::where('id',$id)->get()->first();
        //dd($brand->id);
        return view('hr.allowance.type.edit')->with(compact('allowance'));
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

        $allowance = Allowance::findorFail($id);
        $allowance->title = $request->title;
        $allowance->description = $request->description;
        $allowance->update();
        return redirect(route('allowance.index'))->with('success','Allowance Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $allowance = Allowance::findorFail($id);
        $allowance->delete();
        return redirect(route('allowance.index'))->with('success','Allowance Delete Successfully!');
    }

    public function updateAllowanceStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Allowance::where('id',$data['allowance_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'allowance_id'=> $data['allowance_id']]);
        }
    }
}
