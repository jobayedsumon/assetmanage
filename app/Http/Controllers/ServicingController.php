<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Servicing;
use Illuminate\Http\Request;

class ServicingController extends Controller
{
    //
    public function index()
    {
        $servicings = Servicing::latest()->get();

        return view('servicing.index', compact('servicings'));
    }
    public function create()
    {
        $categories = Category::all();

        return view('servicing.create', compact('categories'));
    }

    public function edit($id)
    {
        $servicing = Servicing::findOrFail($id);
        $categories = Category::all();

        return view('servicing.edit', compact('servicing', 'categories'));
    }

    public function show($id)
    {
        $servicing = Servicing::findOrFail($id);

        return view('servicing.view', compact('servicing'));
    }

    public function receive_form($id)
    {
        $servicing = Servicing::findOrFail($id);

        return view('servicing.receive-form', compact('servicing'));
    }

    public function store(Request $request)
    {
        Servicing::create([
           'item_id' => $request->item,
           'problem' => $request->problem,
           'given_date' => $request->given_date,
           'phone_number' => $request->phone_number,
           'location' => $request->location,
        ]);

        return redirect(route('servicing.create'))->with('status', 'Item given to service center');
    }

    public function item_receive(Request $request, $id)
    {
        $servicing = Servicing::findOrFail($id);

        if ($request->hasFile('document')) {
            $document = now().$request->file('document')->getClientOriginalName();
            $request->file('document')->storeAs('servicing-document', $document);
        } else {
            $document = null;
        }

        $servicing->update([
            'cost' => $request->cost,
            'received_date' => $request->received_date,
            'solution' => $request->solution,
            'document' => $document
        ]);

        return redirect(route('servicing.index'))->with('status', 'Item received successfully');
    }
}
