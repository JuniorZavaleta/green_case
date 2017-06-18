<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Complaint;
use App\Models\ContaminationType;
use App\Models\Channel;
use App\Services\ImageUpload;

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

    public function create()
    {
        $default_latitude = -12.0560257;
        $default_longitude = -77.0844226;
        $contamination_types = ContaminationType::all();

        return view('app.complaints.create', compact(
            'contamination_types', 'default_latitude', 'default_longitude'
        ));
    }

    public function store(ImageUpload $image_uploader)
    {
        $this->validate(request(), [
            'contamination_type' => 'required',
            'latitude'           => 'required',
            'longitude'          => 'required',
            'commentary'         => 'string',
            'image_1'            => 'required|image',
            'image_2'            => 'required|image',
            'image_3'            => 'required|image',
        ]);

        $citizen = Auth::guard('web')->user();

        $complaint = Complaint::create([
            'citizen_id'            => $citizen->id,
            'type_contamination_id' => request('contamination_type'),
            'type_communication_id' => Channel::FACEBOOK,
            'complaint_status_id'   => Complaint::COMPLETED,
            'latitude'              => request('latitude'),
            'longitude'             => request('longitude'),
            'district_id'           => 1,
            'commentary'            => request('commentary')
        ]);
        $file = request()->file('image_1');

        try {
            $image_uploader->saveImageComplaint($file, $complaint->id);
        } catch (\Exception $e) {
            $complaint->delete();
        }

        return redirect()->route('complaint.index')->with('message', 'Reclamo registrado');
    }
}
