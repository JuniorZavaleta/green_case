<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Auth;

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
        $user = Auth::guard('admin')->user();

        $query = Complaint::with('authority', 'contamination_type', 'status');

        if (!$user->is_admin) {
            $query->where('authority_id', $user->id)->completed()->latest();
        }

        $complaints = $query->paginate(15);

        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Show the complaint selected
     * @param  Complaint $complaint complaint selected
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }
}
