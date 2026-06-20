<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    /**
     * Show the login form (or skip straight to the dashboard if already in).
     */
    public function showLogin(Request $request)
    {
        if ($request->session()->get('is_admin')) {
            return redirect()->route('admin.reports.index');
        }

        return view('admin.login');
    }

    /**
     * Verify the shared password against ADMIN_PASSWORD and open a session.
     */
    public function login(Request $request)
    {
        $request->validate(['password' => 'required|string']);

        // Throttle brute-force attempts: 5 tries per minute per IP.
        $key = 'admin-login:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'password' => "Too many attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        $expected = config('admin.password');

        if (empty($expected)) {
            return back()->withErrors([
                'password' => 'Admin password is not configured. Set ADMIN_PASSWORD in the .env file.',
            ]);
        }

        if (! hash_equals((string) $expected, (string) $request->input('password'))) {
            RateLimiter::hit($key, 60);
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();
        $request->session()->put('is_admin', true);

        return redirect()->intended(route('admin.reports.index'));
    }

    /**
     * End the admin session.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        $request->session()->regenerate();

        return redirect()->route('admin.login');
    }
}
