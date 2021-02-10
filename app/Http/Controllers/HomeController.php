<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Transfer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $employees = Employee::all();
        $items = Item::all();
        $assignments = AssetAssignment::all();
        $transfers = Transfer::all();

        return view('dashboard', compact('employees', 'items', 'assignments', 'transfers'));
    }
}
