<?php

namespace App\Http\Middleware;

use App\Models\Gereja;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckGereja
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $nama_gereja = $request->route('nama_gereja');
        Log::info('CheckGereja Middleware - nama_gereja:', ['nama_gereja' => $nama_gereja]);

        if (!$nama_gereja) {
            Log::error('CheckGereja Middleware - Church not found.');
            return abort(404, 'Church not found.');
        }

        $gereja = Gereja::where('nama_gereja', $nama_gereja)->first();
        if (!$gereja) {
            Log::error('CheckGereja Middleware - Church not found in database.');
            return abort(404, 'Church not found.');
        }

        $request->merge(['gereja' => $gereja]);
        Log::info('CheckGereja Middleware - Church found:', ['gereja' => $gereja]);

        return $next($request);
    }
}
