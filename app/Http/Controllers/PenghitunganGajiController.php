<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\PenghitunganGaji;

class PenghitunganGajiController extends Controller
{
    public function index()
    {
        $penghitunganGajis = PenghitunganGaji::all();
        $karyawans = Karyawan::all();
        return view('penghitungan_gaji.index', compact('penghitunganGajis', 'karyawans'));
    }

    public function create()
    {
        return view('penghitungan_gaji.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|string',
            'tanggal' => 'required|date',
            'kode_nik.*' => 'required|string',
            'jumlah_hadir.*' => 'required|integer',
            'gaji_pokok.*' => 'required|numeric',
            'insentif.*' => 'required|numeric',
            'asuransi.*' => 'required|numeric',
            'totalgaji.*' => 'required|numeric',
        ]);

        // Ambil data dari request
        $data = $request->all();

        // Loop untuk membuat entri PenghitunganGaji untuk setiap baris yang disubmit
        foreach ($data['kode_nik'] as $key => $value) {
            PenghitunganGaji::create([
                'periode' => $data['periode'],
                'tanggal' => $data['tanggal'],
                'kode_nik' => $data['kode_nik'][$key],
                'jumlah_hadir' => $data['jumlah_hadir'][$key],
                'gaji_pokok' => $data['gaji_pokok'][$key],
                'insentif' => $data['insentif'][$key],
                'pot_asuransi' => $data['asuransi'][$key],
                'total_gaji' => $data['totalgaji'][$key],
            ]);
        }

        return redirect()->route('penghitungan_gaji.index')
                         ->with('success', 'Penghitungan gaji berhasil disimpan.');
    }

    public function edit(PenghitunganGaji $penghitunganGaji)
    {
        return view('penghitungan_gaji.edit', compact('penghitunganGaji'));
    }

    public function update(Request $request, PenghitunganGaji $penghitunganGaji)
    {
        $request->validate([
            'periode' => 'required|string',
            'tanggal' => 'required|date',
            'kode_nik' => 'required|string',
            'jumlah_hadir' => 'required|integer',
            'gaji_pokok' => 'required|numeric',
            'insentif' => 'required|numeric',
            'pot_asuransi' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);

        $penghitunganGaji->update($request->all());

        return redirect()->route('penghitungan_gaji.index')
                         ->with('success', 'Penghitungan gaji berhasil diperbarui.');
    }

    public function destroy(PenghitunganGaji $penghitunganGaji)
    {
        $penghitunganGaji->delete();

        return redirect()->route('penghitungan_gaji.index')
            ->with('success', 'Penghitungan gaji berhasil dihapus.');
    }

    public function getKaryawanDetail(Request $request)
    {
        $kode_nik = $request->kode_nik;

        // Cari karyawan berdasarkan kode NIK
        $karyawan = Karyawan::where('kode_nik', $kode_nik)->first();

        // Jika karyawan ditemukan, kembalikan respons JSON
        if ($karyawan) {
            return response()->json($karyawan);
        }

        // Jika karyawan tidak ditemukan, kembalikan respons kosong
        return response()->json(null);
    }
}
