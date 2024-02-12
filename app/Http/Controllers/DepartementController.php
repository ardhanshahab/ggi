<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DepartementController extends Controller
{
    public function index()
    {
        //get data
        $posts = Departement::paginate(5);

        //menampilkan view blades
        return view('departement.index', compact('posts'));
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
        // validasi form
        $this->validate($request, [
            'nama_departement'     => 'required|min:1',
            'lokasi_departement'   => 'required|min:1',
        ]);

        Departement::create([
            'nama_departement'     => $request->nama_departement,
            'lokasi_departement'   => $request->lokasi_departement,
        ]);

            return redirect()->route('departement.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
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
        $post = Departement::findOrFail($id);

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
        $post = Departement::findOrFail($id);

        //menampilkan view blade
        return view('departement.edit', compact('post'));
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
            'nama_departement'     => 'required|min:1',
            'lokasi_departement'   => 'required|min:1',

        ]);

        //postID
        $post = Departement::findOrFail($id);

            //update post with new image
            $post->update([
            'nama_departement'     => $request->nama_departement,
            'lokasi_departement'     => $request->lokasi_departement,
            ]);

            return redirect()->route('departement.index')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat mengupdate data!');
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
        $post = Departement::findOrFail($id);

        //delete post
        $post->delete();

        return redirect()->route('departement.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }
}
