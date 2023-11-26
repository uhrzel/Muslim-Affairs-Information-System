<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Logs;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Log user login information for 'user' type only
        if ($request->user()->type === 'user') {
            $this->logUserActivity($request->user()->email, 'login');
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log user logout information for 'user' type only
        if (Auth::user()->type === 'user') {
            $this->logUserActivity(Auth::user()->email, 'logout');
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Log user activity (login or logout) to the 'logs' table.
     */
    private function logUserActivity($email, $activity)
    {
        Logs::create([
            'email' => $email,
            'logs' => $activity,
            'date' => now(),
        ]);
    }
}
