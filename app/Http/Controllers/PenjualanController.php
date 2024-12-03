<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\Produk;



class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::with(['customer', 'karyawan'])->paginate(10); // Relasi ke customer dan karyawan
    return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Mengambil data customer
        $employees = Karyawan::all(); // Mengambil data karyawan
        $produk = Produk::all(); // Mengambil data produk

        return view('penjualan.create', compact('customers', 'employees', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'employee_id' => 'required|exists:karyawan,id', // Validasi ID karyawan
            'produk_id' => 'required|array',
            'produk_id.*' => 'exists:produk,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'payment_method' => 'required|string|max:50',
        ]);

        // Hitung total harga
        $total_price = 0;
        foreach ($validated['produk_id'] as $index => $produkId) {
            $produk = Produk::find($produkId);
            $total_price += $produk->price * $validated['quantity'][$index];
        }

        // Simpan penjualan
        $penjualan = Penjualan::create([
            'customer_id' => $validated['customer_id'],
            'employee_id' => auth()->id(), // Ambil ID karyawan yang sedang login
            'total_price' => $total_price,
            'transaction_date' => now(),
            'payment_method' => $validated['payment_method'],
        ]);

        // Simpan detail produk
        foreach ($validated['produk_id'] as $index => $produkId) {
            $penjualan->penjualanDetails()->create([
                'produk_id' => $produkId,
                'quantity' => $validated['quantity'][$index],
                'subtotal' => Produk::find($produkId)->price * $validated['quantity'][$index],
            ]);
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        $penjualan->load('produk'); // Muat relasi produk
        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
