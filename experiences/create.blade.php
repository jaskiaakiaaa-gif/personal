@extends('layouts.admin-sidebar')

@section('content')
<div class="container">
    <h2>Tambah Pengalaman Baru</h2>

    <form action="{{ route('experiences.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="role" class="form-label">Posisi / Role</label>
            <input type="text" name="role" id="role" class="form-control" placeholder="Contoh: Frontend Developer / Ketua OSIS" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Sekolah / Perusahaan</label>
            <input type="text" name="company" id="company" class="form-control" placeholder="Contoh: PT Tech Indo / SMA Negeri 1" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="text" name="year" id="year" class="form-control" placeholder="Contoh: 2024 - 2025" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Ceritakan tugas atau kegiatan di posisi ini..." required></textarea>
        </div>

        <a href="{{ route('experiences.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-danger">Simpan Pengalaman</button>
    </form>
</div>
@endsection