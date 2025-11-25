<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JenisKeahlian;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        $keahlian = JenisKeahlian::all();

        return view('backend.content.dokter', compact('dokter', 'keahlian'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_dokter' => 'required',
            'nm_dokter' => 'required',
            'JK' => 'required',
            'status' => 'required',
            'tgl_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'Kode_Keahlian' => 'required|exists:jenis_keahlian,Kode_keahlian',
            'alamat' => 'nullable|string',
        ]);

        Dokter::create($validated);

        return redirect()->back()->with('success', 'Data dokter berhasil ditambahkan!');
    }
}
