@extends('layouts.admin-sidebar')

@section('content')
<div class="container-fluid">
    
    <!-- Card Putih Pembungkus Utama -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        
        <!-- Header Judul dan Tombol -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark m-0">Daftar Project / Portofolio</h3>
            <a href="{{ route('projects.create') }}" class="btn text-white rounded-pill px-4 py-2 shadow-sm" style="background-color: #ff2d55; border-color: #ff2d55;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Project Baru
            </a>
        </div>

        <hr class="text-muted mb-4">

        <!-- Tabel Data Proyek -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 ps-3 rounded-start">No</th>
                        <th class="py-3">Nama Project</th>
                        <th class="py-3">Deskripsi</th>
                        <th class="py-3">Link</th>
                        <th class="py-3 text-center rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $index => $project)
                    <tr>
                        <td class="ps-3 fw-semibold">{{ $index + 1 }}</td>
                        <td>{{ $project->title }}</td>
                        <td class="text-muted">{{ Str::limit($project->description, 40) }}</td>
                        <td>
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="badge bg-light text-primary text-decoration-none border px-3 py-2 rounded-pill">
                                    <i class="bi bi-link-45deg me-1"></i> Buka Link
                                </a>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-light text-primary rounded-pill px-3 me-1 border">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light text-danger rounded-pill px-3 border">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data project.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection