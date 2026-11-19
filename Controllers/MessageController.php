<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 1. Simpan pesan ke database (kode asli kamu)
        Message::create([
            'sender_name' => $request->name,
            'sender_email' => $request->email,
            'message' => $request->message,
        ]);

        // 2. Tambahan kode untuk kirim email otomatis ke Gmail kamu
        \Illuminate\Support\Facades\Mail::raw(
            "Ada pesan baru dari website portofolio!\n\nNama: {$request->name}\nEmail: {$request->email}\n\nPesan:\n{$request->message}", 
            function ($mail) use ($request) {
                $mail->to('jaskiaakiaaa@gmail.com')
                     ->subject('Pesan Baru dari: ' . $request->name);
            }
        );

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
}