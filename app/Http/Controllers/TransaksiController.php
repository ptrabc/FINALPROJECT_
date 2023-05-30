<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::orderBy('created_at', 'desc')->get();
        return view('admin.transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::get();
        return view('admin.transaksi.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'total_transaksi' => $request->total,
            'status_transaksi' => 'Lunas',
            'user_id' => $request->user,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
        ]);
        return redirect('admin/transaksi');
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
        $transaksi = Transaksi::find($id);
        $user = User::get();
        return view('admin.transaksi.update', compact('transaksi', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Transaksi::where('id', $id)->update([
            'total_transaksi' => $request->total,
            'user_id' => $request->user,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
        ]);
        return redirect('admin/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $detail = DetailTransaksi::where('transaksi_id', $id)->delete();
        $transaksi->delete();
        return redirect('admin/transaksi');
    }
}
