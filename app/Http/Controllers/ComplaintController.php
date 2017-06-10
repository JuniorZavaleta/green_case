<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ContaminationType;

class ComplaintController extends Controller
{
    public function create()
    {
        $contamination_types = ContaminationType::all();

        $data = [
            'contamination_types' => $contamination_types,
        ];

        return view('citizen.complaints.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type_contamination' => 'integer|required',
            'latitude'           => 'required',
            'longitude'          => 'required',
            'commentary'         => 'string',
        ]);

        $citizen   = Auth::guard('web')->user();
        $authority = Auth::guard('admin')->user();

        $complaint = Complaint::create([
            'citizen_id'            => $citizen->id,
            'authority_id'          => $authority->id,
            'type_contamination_id' => $request->contamination_type,
            'type_communication_id' => 3,
            'complaint_state_id'    => 1,
            'latitude'              => 33.9,
            'longitude'             => 33.9,
            'commentary'            => $request->commentary
        ]);

      return redirect()->route('complaint.index')->with('message', 'reclamo registrado');
    }

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
