@extends('layouts.admin-sidebar')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        
        <div class="mb-4">
            <h3 class="fw-bold text-dark m-0">Pesan Masuk (Messages)</h3>
            <p class="text-muted small mb-0">Daftar pesan yang dikirim pengunjung melalui halaman kontak.</p>
        </div>

        <hr class="text-muted mb-4">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 ps-3 rounded-start">No</th>
                        <th class="py-3">Nama Pengirim</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Pesan</th>
                        <th class="py-3 text-center rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $index => $message)
                    <tr>
                        <td class="ps-3 fw-semibold">{{ $index + 1 }}</td>
                        <td>{{ $message->sender_name ?? $message->name }}</td>
                        <td class="text-muted">{{ $message->sender_email ?? $message->email }}</td>
                        <td>{{ Str::limit($message->message, 50) }}</td>
                        <td class="text-center">
                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
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
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection