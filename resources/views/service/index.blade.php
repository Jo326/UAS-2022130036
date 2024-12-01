@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Service</h1>
    <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">Tambah Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
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
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->total_price }}</td>
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

    {{ $services->links() }}
</div>
@endsection
