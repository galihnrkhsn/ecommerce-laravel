<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use App\Models\Produk;

class LandingController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $category = KategoriProduk::all();
        return view('user.index', compact('produk', 'category'));
    }

    public function shop()
    {
        $produk = Produk::all();
        $produkByKategori = KategoriProduk::with('produk')->get();
        return view('user.shop', compact('produk', 'produkByKategori'));
    }

    public function show($id) {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('user.produk-detail', compact('produk'));
    }

    public function addToCart($id, Request $request)
    {
        $produk = Produk::findOrFail($id);

        $qtyInput = (int) $request->input('qty', 1); // Ambil qty dari form

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qtyInput; // Tambahkan qty baru ke qty lama
        } else {
            $cart[$id] = [
                'nama' => $produk->nm_produk,
                'harga' => $produk->harga,
                'qty' => $qtyInput
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

}
