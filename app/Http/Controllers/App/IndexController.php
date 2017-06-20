<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use DB;

use App\Models\Complaint;

class IndexController extends Controller
{
    /**
     * List the last 15 complaints completed (use default)
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::completed()->latest('id')->paginate();

        if (!session()->has('show_support_message')) {
            session(['show_support_message' => true]);
        }

        // foreach ($complaints as $complaint) {
        //     dd($complaint->images->toJson());
        // }
        return view('app.complaints.index', compact('complaints'));
    }

    public function hideSupportMessage()
    {
        session(['show_support_message' => false]);

        return response()->json(['response' => 'ok'], 200);
    }

    public function nextComplaints()
    {
        $complaints = Complaint::completed()->latest('id')->paginate();

        return $complaints->map(function ($complaint) {
            return [
                'id' => $complaint->id,
                'from' => $complaint->channel->description,
                'type' => $complaint->contamination_type->description,
                'created_at' => $complaint->created_at_formatted,
                'images' => $complaint->images()->pluck('img'),
            ];
        });
    }
}
