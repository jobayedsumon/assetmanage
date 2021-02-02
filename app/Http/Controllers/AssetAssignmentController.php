<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use App\Models\Category;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Transfer;
use Illuminate\Http\Request;

class AssetAssignmentController extends Controller
{
    //

    public function index()
    {
        $assignments = AssetAssignment::latest()->get();

        return view('asset-assignment.index', compact('assignments'));
    }

    public function create()
    {
        $departments = Department::all();
        $categories = Category::all();


        return view('asset-assignment.create', compact('departments', 'categories'));
    }

    public function edit($id)
    {
        $departments = Department::all();
        $categories = Category::all();
        $assignment = AssetAssignment::findOrFail($id);

        return view('asset-assignment.edit', compact('departments', 'categories', 'assignment'));
    }

    public function show($id)
    {
        $assignment = AssetAssignment::findOrFail($id);

        return view('asset-assignment.view', compact('assignment'));
    }

    public function get_department_employee(Request $request)
    {
        $department = Department::findOrFail($request->department);

        return $department->employees;
    }

    public function get_category_item(Request $request)
    {
        $category = Category::findOrFail($request->category);

        return $category->items;
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'employee' => 'required',
            'item' => 'required',
            'assigned_date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($request->employee);
        $item = Item::findOrFail($request->item);

        $employee->items()->sync([
            $item->id => [
                'department_id' => $request->department,
                'condition' => $request->condition,
                'assigned_date' => $request->assigned_date,
                'status' => $request->status,
                'knox' => !!$request->knox,
                'remarks' => $request->remarks
            ]
        ]);

        Transfer::create([
            'item_id' => $item->id,
            'transferred_from' => 0,
            'transferred_to' => $employee->id,
            'transferred_date' => $request->assigned_date,
            'remarks' => $request->remarks
        ]);

        return redirect()->back()->with('status', $item->name . ' assigned to ' . $employee->name);

    }

    public function update(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'employee' => 'required',
            'item' => 'required',
            'assigned_date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($request->employee);
        $item = Item::findOrFail($request->item);

        $employee->items()->sync([
            $item->id => [
                'department_id' => $request->department,
                'condition' => $request->condition,
                'assigned_date' => $request->assigned_date,
                'status' => $request->status,
                'knox' => !!$request->knox,
                'remarks' => $request->remarks
            ]
        ]);

        return redirect()->back()->with('status', 'Assignment updated successfully');

    }
}
