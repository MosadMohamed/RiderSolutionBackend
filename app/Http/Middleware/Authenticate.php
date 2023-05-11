<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request, string ...$guards): ?string
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd(Auth::guard('office'));
        
        if (Auth::guard('office')) {
            return route('office.login');
        } elseif (Auth::guard('web')) {
            return route('admin.login');
        }
        return route('welcome');
    }
}
