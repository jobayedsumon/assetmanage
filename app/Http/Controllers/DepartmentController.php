<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index()
    {
        $departments = Department::all();
        return view('pages.department', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string'
        ]);

        Department::create([
            'name' => $request->name
        ]);

        return redirect(route('department.index'))->with('status', 'Department created successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string'
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->name
        ]);

        return redirect(route('department.index'))->with('status', 'Department updated successfully');
    }
}
