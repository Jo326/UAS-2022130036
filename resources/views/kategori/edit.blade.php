@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $kategori->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $kategori->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
</div>
@endsection
