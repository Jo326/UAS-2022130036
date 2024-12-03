<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('customer')->paginate(10); // Menggunakan pagination jika data banyak
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Mengambil data customer
        return view('service.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'service_date' => 'required|date',
            'status' => 'nullable|string|in:Pending,In Progress,Completed',
        ]);

        Service::create([
            'customer_id' => $validated['customer_id'],
            'description' => $validated['description'],
            'total_price' => $validated['total_price'],
            'service_date' => $validated['service_date'],
            'status' => $validated['status'] ?? 'Pending',
        ]);

        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $customers = Customer::all();
        return view('service.edit', compact('service', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'service_date' => 'required|date',
            'status' => 'nullable|string|in:Pending,In Progress,Completed',
        ]);

        $service->update([
            'customer_id' => $validated['customer_id'],
            'description' => $validated['description'],
            'total_price' => $validated['total_price'],
            'service_date' => $validated['service_date'],
            'status' => $validated['status'] ?? 'Pending',
        ]);

        return redirect()->route('service.index')->with('success', 'Service berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service berhasil dihapus');
    }
}
