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
}
