<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\Branch_office;
use App\Models\Settings\Wing;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch_office::with('wings')->get()->all();
        //dd($branches);
        return view('settings.branch.index')->with(compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wings = Wing::get()->all();
        return view('settings.branch.create')->with(compact('wings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            'address'=>'required',
            'wing_id'=>'required',
            ];
        $this->validate($request,$rules);

        $branch = new Branch_office();
        $branch->title = $request->title;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->address = $request->address;
        $branch->description = $request->description;
        $branch->wing_id = $request->wing_id;
        $branch->save();
        return redirect(route('branch.index'))->with('success','New Branch Create Successfully!');
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
        $branch = Branch_office::where('id',$id)->get()->first();
        $wings = Wing::get()->all();
        //dd($brand->id);
        return view('settings.branch.edit')->with(compact('branch','wings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            'address'=>'required',
            'wing_id'=>'required',
            ];
        $this->validate($request,$rules);

        $branch = Branch_office::findorFail($id);
        $branch->title = $request->title;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->address = $request->address;
        $branch->description = $request->description;
        $branch->wing_id = $request->wing_id;
        $branch->update();
        return redirect(route('branch.index'))->with('success','Branch Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch_office::findorFail($id)->delete();
        return redirect(route('branch.index'))->with('success','Branch Delete Successfully!');
    }
}
