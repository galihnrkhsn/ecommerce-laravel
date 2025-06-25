<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KategoriProduk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = KategoriProduk::all();
        return view('admin.produk.create', compact('kategori'));
    }

    public function edit($id){
        $produk = Produk::findOrFail($id);
        $kategori = KategoriProduk::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);

         $request->validate([
            'id_kategori' => 'required',
            'nm_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/produk/'), $filename);
            $data['gambar'] = $filename;
        }

        $produk->update($data);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nm_produk' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('img/produk/'), $filename);

            $data['gambar'] = $filename;
        }
        Produk::create($data);
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Produk::destroy($id);
        return back()->with('success', 'Produk berhasil dihapus!');
    }

}
