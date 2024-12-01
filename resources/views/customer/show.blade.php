@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Customer</h1>

    <p><strong>Nama:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Alamat:</strong> {{ $customer->address }}</p>

    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
</div>
@endsection
