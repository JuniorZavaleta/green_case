<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('app.complaints.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'citizen_id'            => 'integer|required',
            'authority_id'          => 'integer|required',
            'type_contamination_id' => 'integer|required',
            'type_communication_id' => 'integer|required',
            'complaint_state_id'    => 'integer|required'
            'latitude'              => 'required',
            'longitude'             => 'required',
            'commentary'            => 'string',
        ]);

      $complaint = Complaint::create([
                
            ]);

      return redirect()->route('app.complaints.index')->with('message', 'complaint registered');
   }

    public function index()
    {
        $complaints = Complaint::paginate(10);

        return view('app.complaints.index', compact('complaints'));
    }

}
