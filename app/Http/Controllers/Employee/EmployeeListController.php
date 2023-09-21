<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee\Employee_information;
use App\Models\Employee\Employee_personal_information;
use App\Models\Employee\Employee_bank_information;
use App\Models\Employee\Employee_education_information;
use App\Models\Employee\Employee_emergency_contact;
use App\Models\Employee\Employee_experience_information;
class EmployeeListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$employees = User::with('info','personalinfo','bankinfo','educationinfo','experienceinfo','emergencycontact')->get()->all();
        $employees = User::with('info')->get()->all();
        //dd($employees);
        return view('employee.list.index')->with(compact('employees'));
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
