<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Ambil data profil dari tabel profiles
        $user = Profile::first();
        if (!$user) {
            $user = Profile::create([
                'name' => 'Jaskia Ellysia S.',
                'email' => 'admin@gmail.com',
                'title' => 'Web Developer',
                'bio' => 'suka makan, suka jajan, suka nyanyi, suka coding dan suka uang'
            ]);
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->title = $request->title;

        // Jika ada file foto baru yang di-upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $profile->photo = $path; 
        }

        $profile->save();

        return redirect()->back()->with('success', 'Profil berhasil disimpan!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}