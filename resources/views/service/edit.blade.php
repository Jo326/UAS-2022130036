@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Service</h1>
    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Pilih Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $service->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $service->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $service->total_price }}" required>
        </div>

        <div class="form-group">
            <label for="service_date">Tanggal Service</label>
            <input type="datetime-local" name="service_date" id="service_date" class="form-control" value="{{ \Carbon\Carbon::parse($service->service_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Pending" {{ $service->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $service->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $service->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Service</button>
    </form>
</div>
@endsection
