<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $orders = Order::where('id_pelanggan', auth('web')->id())->latest()->get();
        return view('user.order', compact('orders'));
    }

    public function form($id_order)
    {
        $order = Order::where('id_order', $id_order)
            ->where('id_pelanggan', auth('web')->id())
            ->firstOrFail();

        return view('user.bayar', compact('order'));
    }

    public function upload(Request $request, $id_order)
    {
        $request->validate([
            'no_rekening' => 'required',
            'nama_rekening' => 'required',
            'jumlah_transfer' => 'required|numeric',
            'bukti_transfer' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('bukti_transfer')) {
            $filename = time() . '.' . $request->bukti_transfer->extension();
            $request->bukti_transfer->move(public_path('img/bukti-transfer'), $filename);
            $file   = 'img/bukto-transfer/' . $filename;
        }


        Pembayaran::create([
            'id_order' => $id_order,
            'no_rekening' => $request->no_rekening,
            'nama_rekening' => $request->nama_rekening,
            'jumlah_transfer' => $request->jumlah_transfer,
            'bukti_transfer' => $file,
        ]);

        Order::where('id_order', $id_order)->update(['status' => 'Menunggu Verifikasi']);

        return redirect()->route('user.order')->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}

