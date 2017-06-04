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
        /*$this->validate($request, [
            'citizen_id'            => 'integer|required',
            'authority_id'          => 'integer|required',
            'type_contamination_id' => 'integer|required',
            'type_communication_id' => 'integer|required',
            'complaint_state_id'    => 'integer|required',
            'latitude'              => 'required',
            'longitude'             => 'required',
            'commentary'            => 'string',
        ]);*/

      $complaint = Complaint::create([
                'citizen_id' => 1,
                'authority_id' => 2,
                'type_contamination_id' => 1,
                'type_communication_id' => 1,
                'complaint_state_id'    => 1,
                'latitude' => 33.9,
                'longitude' => 33.9,
                'commentary' => 'prueba'
            ]);

      return redirect()->route('complaint.index')->with('message', 'reclamo registrado');
   }

    /**
     * List the last 10 complaint completed
     * @return View
     */
    public function index()
    {
        $complaints = Complaint::completed()->latest()->paginate(10);

        return view('app.complaints.index', compact('complaints'));
    }

}
