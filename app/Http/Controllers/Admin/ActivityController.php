<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Complaint;

class ActivityController extends Controller
{
    public function index(Complaint $complaint)
    {
        return view('admin.activity.index', compact('complaint'));
    }

    public function create(Complaint $complaint)
    {
        $default_latitude = -12.0560257;
        $default_longitude = -77.0844226;

        return view('admin.activity.create',
            compact('complaint', 'default_latitude', 'default_longitude')
        );
    }

    public function store(Complaint $complaint)
    {

    }
}
