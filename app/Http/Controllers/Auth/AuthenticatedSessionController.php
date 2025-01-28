<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('backend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        if (auth()->check() && auth()->user()->role == 'admin') {
            flash()->success('Login Successfully');
            return  redirect()->route('admin.dashboard');
        } elseif (auth()->check() && auth()->user()->role == 'teacher') {
            flash()->success('Login Successfully');
            return redirect()->route('teacher.dashboard');
        } else {
            flash()->success('Access Denied jklkjkl');
            return redirect()->back();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        flash()->success('Logout Success');
        return redirect('/login');
    }
}
