<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Complaint;

class ActivityController extends Controller
{
    public function index(Complaint $complaint)
    {
        $activities = $complaint->activities;

        return view('admin.activity.index', compact('activities'));
    }
}
