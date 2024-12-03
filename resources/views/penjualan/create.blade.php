@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penjualan</h1>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <!-- Pilih Customer -->
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">-- Pilih Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Karyawan -->
        <div class="mb-3">
            <label for="employee_id" class="form-label">Karyawan</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Produk -->
        <div id="produk-container">
            <div class="row mb-3 produk-row">
                <div class="col-md-6">
                    <label for="produk_id" class="form-label">Produk</label>
                    <select name="produk_id[]" class="form-control" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach($produk as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }} - Rp{{ number_format($item->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" name="quantity[]" class="form-control" min="1" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="button" class="btn btn-danger form-control remove-produk">Hapus</button>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Produk -->
        <div class="mb-3">
            <button type="button" id="add-produk" class="btn btn-success">Tambah Produk</button>
        </div>

        <!-- Metode Pembayaran -->
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
                <option value="Credit Card">Credit Card</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Script untuk menambah/menghapus baris produk
    document.getElementById('add-produk').addEventListener('click', function () {
        const produkContainer = document.getElementById('produk-container');
        const newRow = document.querySelector('.produk-row').cloneNode(true);
        newRow.querySelector('select').value = '';
        newRow.querySelector('input').value = '';
        produkContainer.appendChild(newRow);
    });

    document.getElementById('produk-container').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-produk')) {
            const produkRow = e.target.closest('.produk-row');
            if (document.querySelectorAll('.produk-row').length > 1) {
                produkRow.remove();
            } else {
                alert('Harus ada setidaknya satu produk.');
            }
        }
    });
</script>
@endsection
