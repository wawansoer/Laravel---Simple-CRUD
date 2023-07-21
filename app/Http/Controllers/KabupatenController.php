<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\kabupaten;
use App\Models\provinsi;
use Symfony\Component\HttpFoundation\RedirectResponse;

class KabupatenController extends Controller
{
    public function index(Request $request): View
    {
        $provinsis = provinsi::all();

        $perPage = 5;

        $query = Kabupaten::query();

        if ($request->input('provinsi_id')) {
            $provinsiId = $request->input('provinsi_id');
            $query->where('id_provinsi', $provinsiId);
        }

        if ($request->input('nama_kabupaten')) {
            $nama_kabupaten = $request->input('nama_kabupaten');
            $query->where('nama_kabupaten', 'LIKE', '%' . $nama_kabupaten . '%');
        }

        $query->join('provinsi', 'kabupaten.id_provinsi', '=', 'provinsi.id')
            ->select('kabupaten.*', 'provinsi.nama_provinsi')
            ->orderBy('created_at', 'desc');

        if ($request->action === 'cetak') {
            $kabupaten = $query->get();

            return view('Kabupaten/cetak', compact('kabupaten'));
        }

        $kabupaten = $query->orderBy('created_at', 'desc')->paginate($perPage);

        $provinsis = provinsi::all();

        return view('Kabupaten/index', compact('kabupaten', 'provinsis'));

    }

    public function create(): View
    {
        $provinsis = provinsi::all();
        return view('Kabupaten/create', compact('provinsis'));
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
            'nama_kabupaten' => 'required|min:5|unique:kabupaten',
            'nama_provinsi' => 'required',
            'jumlah_penduduk' => 'required|numeric'
        ]);

        //create kabupaten
        kabupaten::create([
            'nama_kabupaten' => $request->nama_kabupaten,
            'id_provinsi' => $request->nama_provinsi,
            'jumlah_penduduk' => $request->jumlah_penduduk
        ]);

        //redirect to index
        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get kabupaten by ID
        $kabupaten = kabupaten::findOrFail($id);
        $provinsis = provinsi::all();

        //render view with kabupaten
        return view('Kabupaten/edit', compact('kabupaten', 'provinsis'));
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
            'nama_kabupaten' => 'required|min:5|',
            'nama_provinsi' => 'required',
            'jumlah_penduduk' => 'required|numeric'
        ]);

        //get kabupaten by ID
        $kabupaten = kabupaten::findOrFail($id);



        //update kabupaten 
        $kabupaten->update([
            'nama_kabupaten' => $request->nama_kabupaten,
            'id_provinsi' => $request->nama_provinsi,
            'jumlah_penduduk' => $request->jumlah_penduduk
        ]);


        //redirect to index
        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get kabupaten by ID
        $kabupaten = kabupaten::findOrFail($id);

        //delete kabupaten
        $kabupaten->delete();

        //redirect to index
        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}