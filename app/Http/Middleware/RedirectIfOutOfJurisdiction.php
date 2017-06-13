<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfOutOfJurisdiction
{
    /**
     * Redirect if an authtority is logged and try see complaints
     * of other districts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $complaint = $request->route('complaint');

        if (session('district_id')) {
            if ($complaint->district_id != session('district_id')) {
                return redirect()->route('admin.complaint.index')
                    ->with('access_denied', 'Acceso Inválido');
            }
        }

        return $next($request);
    }
}
