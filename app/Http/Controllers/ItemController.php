<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    public function category_items($id)
    {
        $category = Category::findOrFail($id);

        $items = $category->items;

        return view('items.index', compact('items', 'category'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('items.view', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();

        return view('items.edit', compact('item', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'category' => 'required',
           'name' => 'required',
           'identification_no' => 'required|unique:items',
           'cost' => 'required|numeric|min:0',
           'purchase_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = now().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('item-image', $image);
        }

        if ($request->hasFile('document')) {
            $document = now().$request->file('document')->getClientOriginalName();
            $request->file('document')->storeAs('purchase-document', $document);
        }

        Item::create([
           'category_id' => $request->category,
           'name' => $request->name,
           'identification_no' => $request->identification_no,
           'cost' => $request->cost,
           'purchase_date' => $request->purchase_date,
           'description' => $request->description,
           'image' => $image,
           'document' => $document,
        ]);

        return redirect(route('items.index'))->with('status', 'Item created successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'identification_no' => 'required|unique:items,id,'.$id,
            'cost' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = now().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('item-image', $image);

            if (file_exists(storage_path('app/item-image/'.$item->image))) {
                unlink(storage_path('app/item-image/'.$item->image));
            }
        } else {
            $image = $item->image;
        }

        if ($request->hasFile('document')) {
            $document = now().$request->file('document')->getClientOriginalName();
            $request->file('document')->storeAs('purchase-document', $document);

            if (file_exists(storage_path('app/purchase-document/'.$item->document))) {
                unlink(storage_path('app/purchase-document/'.$item->document));
            }
        } else {
            $document = $item->document;
        }

        $item->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'identification_no' => $request->identification_no,
            'cost' => $request->cost,
            'purchase_date' => $request->purchase_date,
            'description' => $request->description,
            'image' => $image,
            'document' => $document,
        ]);

        return redirect(route('items.index'))->with('status', 'Item updated successfully');
    }
}
