@extends('layouts.admin-sidebar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h3 class="fw-bold text-dark mb-4">Pengaturan Profil Saya</h3>

                @if (session('status') === 'profile-updated' || session('success'))
                    <div class="alert alert-success rounded-3 mb-4">Profil berhasil disimpan!</div>
                @endif

                <!-- Form dengan enctype untuk upload file -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Bagian Foto Profil -->
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <img src="{{ isset($user->photo) && $user->photo ? asset('storage/' . $user->photo) : 'https://via.placeholder.com/120' }}" 
                                 alt="Foto Profil" 
                                 class="rounded-circle shadow-sm border" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        </div>
                        <div>
                            <label for="photo" class="btn btn-sm btn-light border rounded-pill px-3 shadow-sm" style="cursor: pointer;">
                                <i class="bi bi-camera me-1"></i> Pilih Foto Profil
                            </label>
                            <input type="file" name="photo" id="photo" class="d-none">
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3 p-3 bg-light border-0" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-3 p-3 bg-light border-0" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <!-- Titel / Keahlian Utama -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-secondary">Titel / Keahlian Utama</label>
                        <input type="text" name="title" id="title" class="form-control rounded-3 p-3 bg-light border-0" value="{{ old('title', $user->title ?? 'Web Developer') }}" placeholder="Contoh: Web Developer">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-end">
                        <button type="submit" class="btn text-white rounded-pill px-4 py-2 shadow-sm" style="background-color: #ff2d55; border-color: #ff2d55;">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection