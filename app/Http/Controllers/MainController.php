<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Halaman utama backend
        return view('backend.layout.main');
    }

    public function pengguna()
    {
        return view('backend.content.pengguna');
    }

    public function level()
    {
        return view('backend.content.level');
    }

    public function pegawai()
    {
        return view('backend.content.pegawai');
    }

    public function master()
    {
        return view('backend.content.master');
    }

    public function dokter()
    {
        return view('backend.content.dokter');
    }

    public function jadwal()
    {
        return view('backend.content.jadwal');
    }

    public function pasien()
    {
        return view('backend.content.pasien');
    }

    public function pendaftaran()
    {
        return view('backend.content.pendaftaran');
    }

    public function diagnosa()
    {
        return view('backend.content.diagnosa');
    }

    public function tindakan()
    {
        return view('backend.content.tindakan');
    }

    public function obat()
    {
        return view('backend.content.obat');
    }

    public function supplier()
    {
        return view('backend.content.supplier');
    }
}
