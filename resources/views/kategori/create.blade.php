@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
