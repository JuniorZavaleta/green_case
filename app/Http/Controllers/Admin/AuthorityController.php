<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Authority;

class AuthorityController extends Controller
{
    public function index()
    {
        $authorities = Authority::all();

        return view('admin.authority.index', compact('authorities'));
    }
}
