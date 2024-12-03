@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Service</h1>
    <form action="{{ route('service.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Pilih Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" name="total_price" id="total_price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="service_date">Tanggal Service</label>
            <input type="datetime-local" name="service_date" id="service_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Service</button>
    </form>
</div>
@endsection
