<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\MessageController;
use App\Models\Project;
use App\Models\User;
use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// 1. HALAMAN UTAMA PENGGUNA (Wajib Login Dulu)
Route::get('/', function () {
    $projects = Project::latest()->get();
    $user = Profile::first();
    $experiences = Experience::latest()->get();
    
    return view('welcome', compact('projects', 'user', 'experiences'));
})->middleware(['auth'])->name('home');

// Rute Pengunjung Mengirim Pesan
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

// 2. HALAMAN FORM VERIFIKASI ADMIN
Route::get('/admin-verify', function () {
    // Reset status verifikasi setiap kali halaman ini dibuka agar selalu meminta verifikasi ulang
    session()->forget('is_admin_verified');
    return view('auth.admin-verify');
})->middleware(['auth'])->name('admin.verify');

// Proses Pengecekan Email & Password Admin dari Form Verifikasi
Route::post('/admin-verify', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $adminUser = User::where('email', 'admin@gmail.com')->first();

    if ($request->email === 'admin@gmail.com' && $adminUser && Hash::check($request->password, $adminUser->password)) {
        session(['is_admin_verified' => true]);
        
        // Langsung masuk ke halaman manajemen Projects (Admin Panel)
        return redirect()->route('projects.index');
    }

    return back()->withErrors(['email' => 'Email atau password admin salah! Silakan coba lagi atau klik Kembali.']);
})->middleware(['auth'])->name('admin.verify.post');

// 3. RUTE DASHBOARD & ADMIN PANEL (Dilindungi Verifikasi Admin)
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        if (auth()->user()->email !== 'admin@gmail.com' && !session('is_admin_verified')) {
            return redirect()->route('admin.verify');
        }
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Projects (Wajib Verifikasi Admin)
    Route::get('/projects', function () {
        if (auth()->user()->email !== 'admin@gmail.com' && !session('is_admin_verified')) {
            return redirect()->route('admin.verify');
        }
        return app(ProjectController::class)->index();
    })->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Experiences (Wajib Verifikasi Admin)
    Route::get('/experiences', function () {
        if (auth()->user()->email !== 'admin@gmail.com' && !session('is_admin_verified')) {
            return redirect()->route('admin.verify');
        }
        return app(ExperienceController::class)->index();
    })->name('experiences.index');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [ExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

    // Messages (Wajib Verifikasi Admin)
    Route::get('/messages', function () {
        if (auth()->user()->email !== 'admin@gmail.com' && !session('is_admin_verified')) {
            return redirect()->route('admin.verify');
        }
        return app(MessageController::class)->index();
    })->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';