@extends('layouts.admin-sidebar')
@section('content')
<div class="container">
    <h2>Tambah Project Baru</h2>

    <!-- PASTIKAN TAG FORM ADA DAN MEMILIKI ACTION & METHOD YANG BENAR -->
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Nama Project</label>
            <!-- PASTIKAN NAME-NYA 'title' -->
            <input type="text" name="title" id="title" class="form-control" placeholder="Contoh: Website E-Commerce" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <!-- PASTIKAN NAME-NYA 'description' -->
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Ceritakan sedikit tentang project ini..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link Project (Opsional)</label>
            <!-- PASTIKAN NAME-NYA 'link' -->
            <input type="url" name="link" id="link" class="form-control" placeholder="https://...">
        </div>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
        
        <!-- PASTIKAN TOMBOL ADA DI DALAM TAG <form> DAN TYPE-NYA submit -->
        <button type="submit" class="btn btn-danger">Simpan Project</button>
    </form>
</div>
@endsection