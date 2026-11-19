@extends('layouts.admin-sidebar')

@section('content')
<div class="container">
    <h2>Edit Data Pengalaman</h2>

    <form action="{{ route('experiences.update', $experience->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="role" class="form-label">Posisi / Role</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ $experience->role }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Sekolah / Perusahaan</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ $experience->company }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="text" name="year" id="year" class="form-control" value="{{ $experience->year }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ $experience->description }}</textarea>
        </div>

        <a href="{{ route('experiences.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
    </form>
</div>
@endsection