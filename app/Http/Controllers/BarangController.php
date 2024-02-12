<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\stok;

class BarangController extends Controller
{
    public function index()
    {
        //get data
        $posts = Barang::paginate(5);

        //menampilkan view blades
        return view('barang.index', compact('posts'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    try{
    // Validate form
    $this->validate($request, [
        'nama_barang'   => 'required|min:1',
        'jenis_barang'  => 'required|min:1',
        'kode_barang'   => 'required|min:1',
    ]);

    // Create barang
    $barang = Barang::create([
        'nama_barang'   => $request->nama_barang,
        'jenis_barang'  => $request->jenis_barang,
        'kode_barang'   => $request->kode_barang,
    ]);

    // Create initial stock
    Stok::create([
        'id_barang'     => $barang->kode_barang,
        'jumlah'          => 10, // Initial stock value
        'status'        => 'Available', // Initial status
    ]);
        return redirect()->route('barang.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
        }
}

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id)
    {
        //postID
        $post = Barang::findOrFail($id);

        //menampilkan view blade
        return view('posts.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id)
    {
        //postID
        $post = Barang::findOrFail($id);

        //menampilkan view blade
        return view('barang.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try{
        //validasi form
        $this->validate($request, [
            'nama_barang'     => 'required|min:1',
            'jenis_barang'   => 'required|min:1',
            'kode_barang'   => 'required|min:1'
        ]);

        //postID
        $post = Barang::findOrFail($id);


            //update post with new image
            $post->update([
            'nama_barang'     => $request->nama_barang,
            'jenis_barang'     => $request->jenis_barang,
            'kode_barang'   => $request->kode_barang
            ]);

            return redirect()->route('barang.index')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Terjadi kesalahan saat mengupdate data!');
        }
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        try{
        //postID
        $post = Barang::findOrFail($id);

        //delete post
        $post->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        return redirect()->route('barang.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
    }
    }
}



