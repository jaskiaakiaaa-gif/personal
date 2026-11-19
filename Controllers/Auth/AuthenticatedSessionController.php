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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Cek apakah email yang login adalah admin
    if (auth()->user()->email === 'admin@gmail.com') {
        return redirect()->intended(route('dashboard')); // Masuk Admin Panel
    } else {
        return redirect()->intended(route('home')); // Masuk Halaman Pengguna (Portofolio)
    }
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();
    $request->session()->forget('is_admin_verified');
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Langsung balik ke halaman login setelah log out!
}
}
