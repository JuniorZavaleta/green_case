<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Complaint;
use App\Models\ContaminationType;

use App\Services\ImageUpload;

class ComplaintController extends Controller
{

    public function __construct(ImageUpload $image_upload)
    {
       $this->image_upload = $image_upload;
    }

    public function create()
    {
        $contamination_types = ContaminationType::all();

        $data = [
            'contamination_types' => $contamination_types,
        ];

        return view('citizen.complaints.create', compact('contamination_types'));
    }

    public function store(Request $request)
    {
        $citizen   = Auth::guard('web')->user();

        $complaint = Complaint::create([
            'citizen_id'            => $citizen->id,
            'type_contamination_id' => $request->contamination_type,
            'type_communication_id' => 3,
            'complaint_state_id'    => 2,
            'latitude'              => 33.9,
            'longitude'             => 33.9,
            'commentary'            => $request->commentary
        ]);
        $file = $request->file('image_1');

        $this->image_upload->saveImageComplaint($file, $complaint->id);

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
