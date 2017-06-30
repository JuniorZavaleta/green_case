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

        //$complaint->citizen->sendNotification($subject, $view, $data);

        return redirect()->route('admin.activity.index', compact('complaint'))
            ->with('message', 'Actividad registrada exitosamente.');
    }

    public function show(Complaint $complaint, Activity $activity)
    {
        return view('admin.activity.show', compact('complaint', 'activity'));
    }
}
