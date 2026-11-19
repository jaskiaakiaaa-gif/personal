@extends('layouts.admin-sidebar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h3 class="fw-bold text-dark mb-1">Pengaturan Profil</h3>
                <p class="text-muted small mb-4">Perbarui informasi akun dan alamat email admin kamu.</p>

                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success rounded-3">Profil berhasil diperbarui!</div>
                @endif

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3 p-3 bg-light border-0" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-3 p-3 bg-light border-0" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <button type="submit" class="btn text-white rounded-pill px-4 py-2 shadow-sm" style="background-color: #ff2d55; border-color: #ff2d55;">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection