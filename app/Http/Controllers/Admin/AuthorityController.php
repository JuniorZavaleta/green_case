<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Authority;
use App\Models\District;
use App\Models\User;

class AuthorityController extends Controller
{
    public function index()
    {
        $authorities = Authority::all();

        return view('admin.authority.index', compact('authorities'));
    }


    public function create()
    {
        $districts = District::all();

        return view('admin.authority.create', compact('districts'));
    }

    public function store()
    {
        $this->validate(request(), [
            'nombre'      => 'required',
            'distrito'    => 'required',
            'e-mail'      => 'required|email',
            'contrasenia' => 'required',
        ]);

        $user = User::create([
            'email'    => request('e-mail'),
            'password' => bcrypt(request('contrasenia')),
            'type_user'=> User::AUTHORITY,
            'state'    => Authority::ACTIVE,
        ]);

        $complaint = Authority::create([
            'id'          => $user->id,
            'district_id' => request('distrito'),
            'name'        => request('nombre')
        ]);

        return redirect()->route('admin.authority.index')
            ->with('message', 'Nueva autoridad registrada');
    }
}
