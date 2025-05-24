<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         /** @var User $user */
        $user = Auth::user();

        if (!Auth::check() || !$user->hasAnyRole(['super_admin', 'Siswa', 'Guru'])) {
            abort(403, 'Anda belum punya akses. Silakan hubungi admin :)');
        }

        return $next($request);
    }
}