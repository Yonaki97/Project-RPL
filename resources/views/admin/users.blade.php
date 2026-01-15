@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Kelola Pengguna</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jumlah Catatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="{{ $user->is_banned ? 'table-danger' : '' }}">
                        <td>{{ $user->id }}</td>
                        <td>
                            {{ $user->name }}
                            @if($user->is_admin)
                                <span class="badge bg-warning text-dark">Admin</span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->catatans_count }}</td>
                        <td>
                            @if($user->is_banned)
                                <span class="badge bg-danger">Banned</span>
                            @else
                                <span class="badge bg-success">Aktif</span>
                            @endif
                        </td>
                        <td>
                            @if(!$user->is_admin && $user->id !== auth()->id())
                                <form action="{{ route('admin.users.toggle-ban', $user->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin {{ $user->is_banned ? 'unban' : 'ban' }} user {{ $user->name }}?')">
                                    @csrf
                                    @if($user->is_banned)
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i> Unban
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-ban"></i> Ban
                                        </button>
                                    @endif
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pengguna</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection