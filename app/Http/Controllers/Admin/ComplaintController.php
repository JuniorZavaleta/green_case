<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Complaint;
use App\Models\ComplaintStatus;
use App\Models\District;
use App\Models\ContaminationType;

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
        $status = ComplaintStatus::pluck('description', 'id');
        $districts = District::orderBy('name')->pluck('name', 'id');
        $contamination_types = ContaminationType::orderBy('description')->pluck('description', 'id');

        $query = Complaint::with('district', 'contamination_type', 'status');

        if (!$user->is_admin) {
            $query->where('authority_id', $user->id)->completed()->latest();
        }

        if (request('distrito')) {
            $query->whereHas('district', function ($q) {
                $q->where('name', request('distrito'));
            });
        }

        if (request('tipo_contaminacion')) {
            $query->whereHas('contamination_type', function ($q) {
                $q->where('description', request('tipo_contaminacion'));
            });
        }

        if (request('estado')) {
            $query->whereHas('status', function ($q) {
                $q->where('description', request('estado'));
            });
        }

        $complaints = $query->paginate(15);

        return view('admin.complaints.index', compact(
            'complaints', 'status', 'districts', 'contamination_types'
        ));
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
