<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use App\Models\Category;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    //
    public function index()
    {
        $assignments = AssetAssignment::latest()->get();

        return view('asset-transfer.index', compact('assignments'));
    }

    public function edit($id)
    {
        $assignment = AssetAssignment::findOrFail($id);
        $departments = Department::all();
        $categories = Category::all();

        return view('asset-transfer.edit', compact('assignment', 'departments', 'categories'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'department' => 'required',
            'employee' => 'required',
            'previous_employee' => 'required',
            'item' => 'required',
            'transferred_date' => 'required|date',
        ]);


        $employee = Employee::findOrFail($request->employee);
        $previous_employee = Employee::findOrFail($request->previous_employee);
        $item = Item::findOrFail($request->item);

        $last_transfer_id = Transfer::where('item_id', $request->item)->latest()->pluck('id')->first();

        Transfer::create([
            'item_id' => $item->id,
            'transfer_id' => $last_transfer_id,
            'transferred_from' => $previous_employee->id,
            'transferred_to' => $employee->id,
            'transferred_date' => $request->transferred_date,
            'remarks' => $request->remarks
        ]);

        $employee->items()->attach([
            $item->id => [
                'department_id' => $request->department,
            ]
        ]);

        return redirect(route('asset-transfer.index'))->with('status', $item->name . ' transferred to ' . $employee->name);

    }
}
