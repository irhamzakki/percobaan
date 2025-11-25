<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class PasienController extends Controller

{
    public function index()
    {
        $dokter = Dokter::all();
        return view('backend.content.dokter', compact('dokter'));
    }

    public function create()
    {
        return view('backend.content.dokter_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|unique:data_dokter,id_dokter',
            'nm_dokter' => 'required',
            'JK' => 'required',
            'status' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect('/dokter')->with('success', 'Data dokter berhasil ditambahkan!');
    }
}
