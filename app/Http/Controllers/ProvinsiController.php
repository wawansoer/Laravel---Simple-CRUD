<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\provinsi;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProvinsiController extends Controller
{
    public function index(Request $request): View
    {

        $perPage = 5;

        $query = Provinsi::when(
            $request->has('nama_provinsi'),
            function ($query) use ($request) {
                $namaProvinsi = $request->input('nama_provinsi');
                $query->where('nama_provinsi', 'LIKE', '%' . $namaProvinsi . '%');
            }
        );

        $provinsi = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return view('Provinsi/index', compact('provinsi'));
    }

    public function create(): View
    {
        return view('Provinsi/create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_provinsi' => 'required|min:5|unique:provinsi',
        ]);

        //create provinsi
        provinsi::create([
            'nama_provinsi' => $request->nama_provinsi,
        ]);

        //redirect to index
        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get provinsi by ID
        $provinsi = provinsi::findOrFail($id);

        //render view with provinsi
        return view('Provinsi/edit', compact('provinsi'));
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
        //validate form
        $this->validate($request, [
            'nama_provinsi' => 'required|min:5|unique:provinsi',
        ]);

        //get provinsi by ID
        $provinsi = provinsi::findOrFail($id);



        //update provinsi 
        $provinsi->update([
            'nama_provinsi' => $request->nama_provinsi,
        ]);


        //redirect to index
        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get provinsi by ID
        $provinsi = provinsi::findOrFail($id);

        //delete provinsi
        $provinsi->delete();

        //redirect to index
        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}