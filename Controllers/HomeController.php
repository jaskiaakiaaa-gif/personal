<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan halaman utama portofolio
    public function index()
{
    // Mengambil user pertama dari database
    $user = \App\Models\User::first(); 
    $projects = \App\Models\Project::latest()->get();
    $experiences = \App\Models\Experience::all();

    return view('welcome', compact('user', 'projects', 'experiences'));
}
    // Menyimpan pesan dari pengunjung
    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Menyimpan data dengan menyesuaikan nama kolom di database (sender_name & sender_email)
        Message::create([
            'sender_name' => $request->name,
            'sender_email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Pesan kamu berhasil dikirim! Terima kasih ya.');
    }
}