<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Loan;
use App\Models\ReturnItem;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalItems = Item::count();
        $totalLoans = Loan::count();
        $totalReturns = ReturnItem::count();
        
        $submittedLoans = Loan::where('status', 'submitted')->count();
        $approvedLoans = Loan::where('status', 'approved')->count();
        $waitingLoans = Loan::where('status', 'waiting')->count();
        $returnedLoans = Loan::where('status', 'returned')->count();
        
        $recentActivities = ActivityLog::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('dashboard', compact(
            'totalUsers',
            'totalItems',
            'totalLoans',
            'totalReturns',
            'submittedLoans',
            'approvedLoans',
            'waitingLoans',
            'returnedLoans',
            'recentActivities'
        ));
    }
}
