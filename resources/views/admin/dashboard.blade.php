@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Dashboard Admin</h2>
        </div>
    </div>

    <div class="row">
        <!-- Total Users -->
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Catatan -->
        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Catatan</h5>
                    <h2>{{ $totalCatatans }}</h2>
                </div>
            </div>
        </div>

        <!-- Banned Users -->
        <div class="col-md-4 mb-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">User Dibanned</h5>
                    <h2>{{ $bannedUsers }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <a href="{{ route('admin.users') }}" class="btn btn-lg btn-primary w-100">
                Kelola Pengguna
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('admin.catatans') }}" class="btn btn-lg btn-success w-100">
                Kelola Catatan
            </a>
        </div>
    </div>
</div>
@endsection