<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Item;
use App\Models\Category;

class LoanController extends Controller
{
    public function index() {
        $items = Item::with('category')->get();
        $categories = Category::all();
        $loans = Loan::with('user', 'item')->get();
        return view('loans.index', compact('loans', 'items', 'categories'));
    }
    public function show() {
        $items = Item::with('category')->get();
        $categories = Category::all();
        $loans = Loan::with('user', 'item')->get();
        return view('loans.index-table', compact('loans', 'items', 'categories'));
    }

    public function create() {
        $items = Item::with('category')->get();
        $categories = Category::all();
        $loans = Loan::with('user', 'item')->get();
        return view('loans.create', compact('loans', 'items', 'categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $item = Item::findOrFail($request->item_id);
        $quantity = $request->quantity;

        if ($item->available_quantity < $quantity) {
            return redirect()->back()->with(['error' => 'Quantity tidak tersedia! Available: ' . $item->available_quantity]);
        }

        // Generate loan_code
        $lastLoan = Loan::orderBy('id', 'desc')->first();
        $nextNumber = ($lastLoan ? $lastLoan->id : 0) + 1;
        $loanCode = 'L' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        $data = [
            'loan_code' => $loanCode,
            'borrower_id' => auth()->id(),
            'item_id' => $request->item_id,
            'quantity' => $quantity,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => 'submitted',
            'notes' => $request->input('notes', ''),
        ];

        $loan = Loan::create($data);

        $item->available_quantity -= $quantity;
        $item->save();

        return redirect()->route('loans.index')->with(['success' => 'Loan created successfully!']);
    }

    public function update(Request $request, $id) {
        $loan = Loan::findOrFail($id);

        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:loan_date',
            'status' => 'required|string',
        ]);

        $item = Item::findOrFail($request->item_id);
        $newQuantity = $request->quantity;
        $oldQuantity = $loan->quantity;
        $quantityDifference = $newQuantity - $oldQuantity;

        if ($quantityDifference > 0 && $item->available_quantity < $quantityDifference) {
            return redirect()->back()->with(['error' => 'Quantity tidak tersedia! Available: ' . $item->available_quantity]);
        }

        $loan->update([
            'item_id' => $request->item_id,
            'quantity' => $newQuantity,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
            'notes' => $request->input('notes', ''),
        ]);

        if ($quantityDifference != 0) {
            $item->available_quantity -= $quantityDifference;
            $item->save();
        }

        return redirect()->route('loans.index')->with(['success' => 'Loan updated successfully!']);
    }

    public function destroy($id) {
        $loan = Loan::findOrFail($id);

        if ($loan->status !== 'submitted') {
            return redirect()->back()->with(['error' => 'Hanya loan dengan status submitted yang bisa dihapus!']);
        }

        $item = $loan->item;
        $item->available_quantity += $loan->quantity;
        $item->save();

        $loan->delete();

        return redirect()->route('loans.index')->with(['success' => 'Loan deleted successfully!']);
    }
}
