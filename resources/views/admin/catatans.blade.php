@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Kelola Catatan</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Pemilik</th>
                        <th>Likes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatans as $catatan)
                    <tr>
                        <td>{{ $catatan->id }}</td>
                        <td>{{ Str::limit($catatan->judul, 50) }}</td>
                        <td>{{ $catatan->kategori->nama ?? '-' }}</td>
                        <td>{{ $catatan->user->name }}</td>
                        <td>{{ $catatan->likes_count }}</td>
                        <td>
                            <form action="{{ route('admin.catatans.destroy', $catatan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $catatans->links() }}
        </div>
    </div>
</div>
@endsection