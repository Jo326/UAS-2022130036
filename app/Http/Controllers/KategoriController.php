<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar kategori dengan pagination
        $kategori = Kategori::paginate(20);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah kategori baru
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Menyimpan kategori baru ke database
        Kategori::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        // Menampilkan detail kategori
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        // Menampilkan form untuk mengedit kategori
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Memperbarui kategori
        $kategori->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        // Menghapus kategori
        $kategori->delete();

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
