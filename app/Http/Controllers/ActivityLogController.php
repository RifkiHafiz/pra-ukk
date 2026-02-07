<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index() {
        $activityLogs = ActivityLog::with('user')->orderBy('created_at', 'desc')->get();
        return view('activity-logs.index', compact('activityLogs'));
    }
}
