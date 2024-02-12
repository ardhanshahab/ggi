<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mitra;
use App\Models\User;

class MitraController extends Controller
{
    public function index()
    {
        //get data
        $mitras = Mitra::with(['departement', 'user'])->paginate(5);

        $users = User::get();
        $departements = Departement::get();

        return view('mitra.index', compact('mitras', 'users', 'departements'));
    }

    public function store(Request $request)
{
        try{
        // validasi form
        $this->validate($request, [
            'id_nik'     => 'required|min:1',
            'id_departement'   => 'required|min:1',
        ]);

        Mitra::create([
            'id_nik'     => $request->id_nik,
            'id_departement'   => $request->id_departement,
        ]);
        return redirect()->route('mitra.index')->with('success', 'Data berhasil ditambah !');
            } catch (\Exception $e) {
        return redirect()->route('mitra.index')->with('error', 'Terjadi kesalahan saat menambah data!');
        }
    }

public function destroy($id)
{
    try {
        // Mengambil data mitra berdasarkan ID
        $mitra = Mitra::findOrFail($id);

        // Menghapus data mitra
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Data berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->route('mitra.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
    }
}


}
