<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailTransaksi::orderBy('created_at', 'desc')->get();
        return view('admin.detail_transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaksi = Transaksi::get();
        $produk = Product::get();
        return view('admin.detail_transaksi.create', compact('transaksi', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DetailTransaksi::create([
            'quantity' => $request->quantity,
            'transaksi_id' => $request->transaksi,
            'product_id' => $request->produk,
        ]);
        return redirect('admin/detail_transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::get();
        $produk = Product::get();
        $detail = DetailTransaksi::find($id);
        return view('admin.detail_transaksi.update', compact('transaksi', 'produk', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DetailTransaksi::where('id', $id)->update([
            'quantity' => $request->quantity,
            'transaksi_id' => $request->transaksi,
            'product_id' => $request->produk,
        ]);
        return redirect('admin/detail_transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = DetailTransaksi::find($id);
        $detail->delete();
        return redirect('admin/detail_transaksi');
    }
}
