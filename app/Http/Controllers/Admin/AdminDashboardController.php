<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalProduk = Produk::count();
        $totalPendapatan = Order::whereIn('status', ['Selesai', 'Dikirim'])->sum('total_order');
        $totalArtikel = KategoriProduk::count();
        $produk = Produk::all();

        return view('admin.dashboard', compact('totalUser', 'produk', 'totalProduk', 'totalPendapatan', 'totalArtikel'));
    }

    public function order()
    {
        $total = Order::count();
        $belum = Order::where('status', 'Belum Dibayar')->count();
        $verif = Order::where('status', 'Menunggu Verifikasi')->count();
        $diproses = Order::where('status', 'Diproses')->count();
        $dikirim = Order::where('status', 'Dikirim')->count();
        $diterima = Order::where('status', 'Selesai')->count();
        $orders = Order::with('user')->latest()->get();


        return view('admin.order.index', compact('total', 'belum', 'verif', 'diproses', 'dikirim', 'diterima', 'orders'));
    }

    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        Order::where('id_order', $id)->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diperbarui');
    }

    public function updateResi($id, Request $request)
    {
        $request->validate([
            'no_resi' => 'required'
        ]);

        Order::where('id_order', $id)->update([
            'no_resi' => $request->no_resi
        ]);

        return back()->with('success', 'Nomor resi berhasil diperbarui');
    }
}
