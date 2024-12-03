@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penjualan</h1>
    <p>Customer: {{ $penjualan->customer->name }}</p>
    <p>Tanggal Transaksi: {{ $penjualan->transaction_date }}</p>
    <p>Metode Pembayaran: {{ $penjualan->payment_method }}</p>
    <p>Total Harga: Rp{{ number_format($penjualan->total_price, 0, ',', '.') }}</p>

    <h3>Produk yang Dibeli</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->produk as $produk)
                <tr>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->pivot->quantity }}</td>
                    <td>Rp{{ number_format($produk->price, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($produk->pivot->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
