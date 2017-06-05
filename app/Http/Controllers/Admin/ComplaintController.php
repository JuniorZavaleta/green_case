<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Auth;

/**
 * ComplaintController is a class that manage the complaints applying filters
 * if the user is authority or admin
 *
 * @package App\Http\Controllers\Admin
 * @author Junior Zavaleta
 * @version 1.0
 */
class ComplaintController extends Controller
{
    /**
     * List the last 15 complaints completed
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();

        if ($user->is_admin) {
            $query = new Complaint;
        } else {
            $query = Complaint::where('authority_id', $user->id)
                ->completed()
                ->latest();
        }

        $complaints = $query->paginate(15);

        return view('admin.complaints.index', compact('complaints'));
    }
}
