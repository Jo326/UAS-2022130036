@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>

    <p><strong>Nama:</strong> {{ $karyawan->name }}</p>
    <p><strong>Posisi:</strong> {{ $karyawan->position }}</p>
    <p><strong>Email:</strong> {{ $karyawan->email }}</p>
    <p><strong>Telepon:</strong> {{ $karyawan->phone }}</p>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
</div>
@endsection
