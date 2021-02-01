<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.view', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('employee.edit', compact('employee', 'departments'));
    }

    public function department_employees($id)
    {
        $department = Department::findOrFail($id);

        $employees = $department->employees;

        return view('employee.index', compact('employees', 'department'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employee.create', compact('departments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'department' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $employee = Employee::create([
            'department_id' => $request->department,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'nid' => $request->nid,
            'address' => $request->address,
            'joining_date' => $request->joining_date,
        ]);

        return redirect(route('employee.department', $employee->department_id))->with('status', 'Employee added successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'department' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'department_id' => $request->department,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'nid' => $request->nid,
            'address' => $request->address,
            'joining_date' => $request->joining_date,
        ]);

        return redirect(route('employee.department', $employee->department_id))->with('status', 'Employee updated successfully');
    }
}
