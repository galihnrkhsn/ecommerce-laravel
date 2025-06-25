<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategori = KategoriProduk::all();
        return view('admin.kategori_produk.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori_produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kategori' => 'required|max:50'
        ]);

        KategoriProduk::create($request->all());

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        KategoriProduk::destroy($id);
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
