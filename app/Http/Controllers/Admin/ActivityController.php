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
        if ($complaint->is_finished) {
            return redirect()->route('admin.activity.index', compact('complaint'))
                ->with('access_denied', 'Caso de contaminación ya finalizado. No se pueden agregar actividades.');
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

        $message = 'Se ha realizado una nueva actividad sobre tu caso de contaminación.';
        // If is the first activity of the complaint then change the complaint status
        if ($complaint->activities()->count() == 0) {
            $complaint->complaint_status_id = Complaint::ON_ATTENTION;
            $complaint->save();

            $complaint->addRecord(Complaint::ON_ATTENTION);
            $message .= ' Asimismo se empezó a trabajar en tu caso de contaminación.';
        } elseif (request('last_activity')) {
            // If exists last_activity then change the complaint status to completed
            $complaint->complaint_status_id = Complaint::FINISHED;
            $complaint->save();

            $complaint->addRecord(Complaint::FINISHED);
            $message .= ' Asimismo se da por finalizado en tu caso de contaminación.';
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
            'images'   => $activity->images,
            'message'  => $message,
        ];

        $complaint->citizen->sendNotification($subject, $view, $data);

        return redirect()->route('admin.activity.index', compact('complaint'))
            ->with('message', 'Actividad registrada exitosamente.');
    }

    public function show(Complaint $complaint, Activity $activity)
    {
        return view('admin.activity.show', compact('complaint', 'activity'));
    }

    public function edit(Complaint $complaint, Activity $activity)
    {
        return view('admin.activity.edit', compact('complaint', 'activity'));
    }

    public function update(Complaint $complaint, Activity $activity)
    {
        $this->validate(request(), [
            'titulo'      => 'required',
            'descripcion' => 'required',
        ]);

        $activity->title = request('titulo');
        $activity->description = request('descripcion');
        $activity->save();

        $message = 'Se ha realizado una corrección a una actividad sobre tu caso de contaminación.';

        if (request()->has('last_activity') && !$complaint->is_finished) {
            $complaint->complaint_status_id = Complaint::FINISHED;
            $complaint->save();

            $complaint->addRecord(Complaint::FINISHED);
            $message .= ' Además se da por finalizado el caso de contaminación.';
        } elseif (request()->has('last_activity') && $complaint->is_finished) {
            $complaint->complaint_status_id = Complaint::ON_ATTENTION;
            $complaint->save();

            $complaint->addRecord(Complaint::ACCEPTED);
            $message .= ' Además se seguirá atendiendo el caso de contaminación.';
        }

        $subject = 'Actividad actualizada en su caso de contaminación';
        $view = 'edit_activity';
        $data = [
            'activity' => $activity,
            'images' => $activity->images,
            'message' => $message,
        ];

        $complaint->citizen->sendNotification($subject, $view, $data);

        return redirect()->route('admin.activity.index', compact('complaint'))
            ->with('message', 'Actividad actualizada exitosamente');
    }
}
