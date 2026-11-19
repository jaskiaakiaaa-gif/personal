@extends('layouts.admin-sidebar')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pengalaman (Experiences)</h2>
        <a href="{{ route('experiences.create') }}" class="btn btn-danger rounded-pill px-4">+ Tambah Experience</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Posisi / Role</th>
                        <th>Perusahaan / Instansi</th>
                        <th>Periode</th>
                        <th>Deskripsi</th> {{-- Tambahan Kolom Deskripsi --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $index => $experience)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $experience->role }}</td>
                        <td>{{ $experience->company }}</td>
                        <td>{{ $experience->year }}</td>
                        <td>{{ Str::limit($experience->description, 40) }}</td> {{-- Menampilkan sebagian deskripsi agar rapi --}}
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</a>
                                <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data pengalaman yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection