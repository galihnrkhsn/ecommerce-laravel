<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = array_sum(array_map(function ($item) {
            return $item['harga'] * $item['qty'];
        }, $cart));

        return view('cart.index', compact('cart', 'total'));
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] < 1) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Jumlah produk dikurangi.');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;

            if ($cart[$id]['qty'] < 1) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Jumlah produk ditambah.');
    }


    public function checkout(Request $request)
    {
        DB::beginTransaction();

        try {
            $cart = session('cart', []);
            $total = array_sum(array_map(function ($item) {
                return $item['harga'] * $item['qty'];
            }, $cart));

            $order = Order::create([
                'id_pelanggan' => Auth::id(),
                'nm_penerima' => $request->nm_penerima,
                'telp' => $request->telp,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kode_pos' => $request->kode_pos,
                'alamat_pengiriman' => $request->alamat,
                'tgl_order' => now(),
                'ongkir' => 0,
                'total_order' => $total,
            ]);

            foreach ($cart as $id => $item) {
                DetailOrder::create([
                    'id_order' => $order->id_order,
                    'id_produk' => $id,
                    'nm_produk' => $item['nama'],
                    'harga' => $item['harga'],
                    'jml_order' => $item['qty'],
                    'berat' => 0,
                    'subberat' => 0,
                    'subharga' => $item['harga'] * $item['qty'],
                ]);
            }

            session()->forget('cart');
            DB::commit();

            return redirect()->route('landing')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal checkout: ' . $e->getMessage());
        }
    }
}
