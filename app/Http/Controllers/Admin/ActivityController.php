<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Complaint;
use App\Models\Activity;

use App\Services\ImageUpload;

class ActivityController extends Controller
{
    public function index(Complaint $complaint)
    {
        return view('admin.activity.index', compact('complaint'));
    }

    public function create(Complaint $complaint)
    {
        if ($complaint->is_attended) {
            return redirect()->route('admin.activity.index', compact('complaint'))
                ->with('access_denied', 'Actividad ya finalizada. No se pueden agregar actividades.');
        }

        $default_latitude = -12.0560257;
        $default_longitude = -77.0844226;

        return view('admin.activity.create',
            compact('complaint', 'default_latitude', 'default_longitude')
        );
    }

    public function store(Complaint $complaint, ImageUpload $image_uploader)
    {
        $this->validate(request(), [
            'titulo'      => 'required',
            'descripcion' => 'required',
            'files'       => 'required',
            'files.*'     => 'image'
        ], [
            'files.required' => 'Debe ingresar al menos una imagen',
        ]);

        // If is the first activity of the complaint then change the complaint status
        if ($complaint->activities()->count() == 0) {
            $complaint->complaint_status_id = Complaint::ON_ATTENTION;
            $complaint->save();

            $complaint->addRecord(Complaint::ON_ATTENTION);;
        }
        // If exists last_activity then change the complaint status to completed
        elseif (request('last_activity')) {
            $complaint->complaint_status_id = Complaint::ATTENDED;
            $complaint->save();

            $complaint->addRecord(Complaint::ATTENDED);
        }

        $activity = $complaint->activities()->create([
            'title' => request('titulo'),
            'description' => request('descripcion')
        ]);

        foreach (request('files') as $key => $image) {
            $filename = "img/actividades/actividad_{$activity->id}_{$key}";
            $path = $image_uploader->save($image, $filename);

            $activity->images()->create(['img' => $path]);
        }

        $subject = 'Nueva actividad en su caso de contaminación';
        $view = 'new_activity';
        $data = [
            'activity' => $activity,
            'images' => $activity->images,
        ];

        $complaint->citizen->sendNotification($subject, $view, $data);

        return redirect()->route('admin.activity.index', compact('complaint'))
            ->with('message', 'Actividad registrada exitosamente.');
    }

    public function show(Complaint $complaint, Activity $activity)
    {
        return view('admin.activity.show', compact('complaint', 'activity'));
    }
}
