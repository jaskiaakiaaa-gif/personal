@extends('layouts.admin-sidebar')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <h3 class="mb-4 fw-bold text-dark">Edit Data Project</h3>
            
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Project</label>
                    <!-- DIUBAH MENJADI title AGAR SESUAI DENGAN DATABASE DAN CONTROLLER -->
                    <input type="text" name="title" class="form-control rounded-3 p-3 bg-light border-0" value="{{ $project->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control rounded-3 p-3 bg-light border-0" rows="4" required>{{ $project->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Link Project (Opsional)</label>
                    <input type="url" name="link" class="form-control rounded-3 p-3 bg-light border-0" value="{{ $project->link }}" placeholder="https://...">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('projects.index') }}" class="btn btn-light rounded-pill px-4 text-muted">Batal</a>
                    <button type="submit" class="btn rounded-pill px-4 text-white shadow-sm" style="background-color: #d81b60;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection