<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use App\Models\Complaint;

class IndexController extends Controller
{
    /**
     * List the last 10 complaints completed
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::completed()->latest()->paginate(10);

        if (!session()->has('show_support_message')) {
            session(['show_support_message' => true]);
        }

        return view('app.complaints.index', compact('complaints'));
    }

    public function hideSupportMessage()
    {
        session(['show_support_message' => false]);

        return response()->json(['response' => 'ok'], 200);
    }
}
