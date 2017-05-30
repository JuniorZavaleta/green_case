<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('complaints.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'citizen_id',
            'authority_id',
            'type_contamination_id',
            'type_communication_id'
            'complaint_state_id',
            'latitude',
            'longitude',
            'commentary'
        ]);

      $citizen = Citizen::create([
                'name' => $facebook_user->user['first_name']
            ]);

      $area->save();

      return redirect()->route('areas.index')->with('message', 'registered area');
   }
}
