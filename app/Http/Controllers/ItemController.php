<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $items = Item::with('category')->get();
        $categories = Category::all();
        return view('items.index', compact('items', 'categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'item_code' => 'required|string|max:50|unique:items',
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'total_quantity' => 'required|integer',
            'available_quantity' => 'required|integer',
            'item_image' => 'nullable|image|max:2048',
            'condition' => 'required|in:Good,Damaged',
        ]);

        $data = [
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'total_quantity' => $request->total_quantity,
            'available_quantity' => $request->available_quantity,
            'condition' => $request->condition,
        ];

        if ($request->hasFile('item_image')) {
            $data['item_image'] = $request->file('item_image')->store('items', 'public');
        }

        Item::create($data);

        return redirect()->route('items.index')->with(['success' => 'Item created successfully!']);
    }

    public function edit($id) {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id) {
        $item = Item::findOrFail($id);

        $request->validate([
            'item_code' => 'required|string|max:50|unique:items,item_code,' . $item->id,
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'total_quantity' => 'required|integer',
            'available_quantity' => 'required|integer',
            'item_image' => 'nullable|image|max:2048',
            'condition' => 'required|in:Good,Damaged',
        ]);

        $data = [
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'total_quantity' => $request->total_quantity,
            'available_quantity' => $request->available_quantity,
            'condition' => $request->condition,
        ];

        if ($request->hasFile('item_image')) {
            $data['item_image'] = $request->file('item_image')->store('items', 'public');
        }

        $item->update($data);

        return redirect()->route('items.index')->with(['success' => 'Item updated successfully!']);
    }

    public function destroy($id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with(['success' => 'Item deleted successfully!']);
    }
}
