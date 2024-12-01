@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penjualan</h1>
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>{{ $item->transaction_date }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>
                        <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus penjualan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $penjualan->links() }}
</div>
@endsection