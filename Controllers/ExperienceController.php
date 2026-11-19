<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'role' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'year' => 'required|string|max:50',
        'description' => 'required|string',
    ]);

    Experience::create([
        'role' => $request->role,
        'company' => $request->company,
        'year' => $request->year,
        'description' => $request->description,
    ]);

    return redirect()->route('experiences.index')->with('success', 'Experience berhasil ditambahkan!');
}

    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        $experience->update([
            'role' => $request->role,
            'company' => $request->company,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        return redirect()->route('experiences.index')->with('success', 'Experience berhasil diperbarui!');
    }
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience berhasil dihapus!');
    }
}