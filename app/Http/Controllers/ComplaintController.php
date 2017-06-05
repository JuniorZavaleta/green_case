<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    /**
     * List the last 10 complaints completed
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::completed()->latest()->paginate(10);

        return view('app.complaints.index', compact('complaints'));
    }
}
