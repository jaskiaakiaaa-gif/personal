<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan semua daftar project
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Menampilkan halaman form tambah project
    public function create()
    {
        return view('projects.create');
    }

    // Menyimpan data project baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit project
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Mengupdate data project yang sudah ada
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    // Menghapus project
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }
}