<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Complaint;

/**
 * ComplaintController is a class that manage the complaints applying filters
 * if the user is authority or admin
 *
 * @package App\Http\Controllers\Admin
 * @author Junior Zavaleta
 * @version 1.0
 */
class ComplaintController extends Controller
{
    /**
     * List the last 15 complaints completed
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::completed()->latest()->paginate(15);

        return view('admin.complaints.index', compact('complaints'));
    }
}
