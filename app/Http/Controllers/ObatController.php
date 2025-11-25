<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('backend.content.obat', compact('obat'));
    }
        public function store(Request $request)
    {
        $validated = $request->validate([
            'Kode_obat' => 'required',
            'nm_obat' => 'required',
            'harga_obat' => 'required|numeric',
            'tgl_kadaluarsa' => 'required|date',
            'satuan' => 'required',
            'letak_obat' => 'required',
            'stok' => 'required|numeric',
        ]);

        \App\Models\Obat::create($validated);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan!');
    }

}
