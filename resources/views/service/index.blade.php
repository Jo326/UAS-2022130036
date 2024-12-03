@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Service</h1>
    <a href="{{ route('service.create') }}" class="btn btn-success mb-3">Tambah Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Deskripsi</th>
                        <th>Total Harga</th>
                        <th>Tanggal Service</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ Str::limit($item->description, 50) }}</td>
                            <td>Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td>{{ $item->service_date }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('service.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('service.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus service ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $services->links() }} <!-- Pagination -->
</div>
@endsection
