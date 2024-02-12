<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use App\Models\stok;

class StokController extends Controller
{
    //
    public function index()
    {
        //get data
        $barang = DB::table('barangs')
        ->join('stoks', 'barangs.kode_barang', '=', 'stoks.id_barang')
        ->select('barangs.*', 'stoks.jumlah', 'stoks.status')
        ->paginate(5);

        //menampilkan view blades
        return view('stock.index', compact('barang'));
    }
    public function update(Request $request, $id)
    {
        try {
            // Validasi formulir jika diperlukan
            $request->validate([
                'new_stock' => 'required|numeric|min:0',
                'new_status' => 'required|in:Available,Empty',
            ]);

            // Temukan stok berdasarkan kode_barang
            $stok = Stok::where('id_barang', $id)->firstOrFail();

            // Perbarui jumlah stok dan status
            $stok->jumlah = $request->new_stock;
            $stok->status = $request->new_status;

            // Jika status baru adalah "Empty", set jumlah stok menjadi 0
            if ($request->new_status == "Empty") {
                $stok->jumlah = 0;
            }

            $stok->save();

            return redirect()->back()->with('success', 'Stok berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data!');
        }
    }


}

