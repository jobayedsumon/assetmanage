<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;

class AssetAssignmentController extends Controller
{
    //

    public function create()
    {
        $departments = Department::all();
        $categories = Category::all();

        return view('asset-assignment.create', compact('departments', 'categories'));
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
}
