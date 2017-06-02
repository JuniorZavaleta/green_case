<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::completed()->latest()->paginate(15);

        return view('admin.complaints.index', compact('complaints'));
    }
}
