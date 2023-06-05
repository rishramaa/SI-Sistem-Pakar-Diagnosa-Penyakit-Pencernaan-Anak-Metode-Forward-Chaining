<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PakarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakar = Pakar::paginate(10);
        return view('pakar/pakar', compact('pakar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pakar/tambah-pakar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pakar' => 'required',
            'nama_pakar' => 'required',
            'spesialis' => 'required',
        ]);

        Pakar::create([
            'id_pakar' => $request->id_pakar,
            'nama_pakar'  => $request->nama_pakar,
            'spesialis' => $request->spesialis,
        ]);
        return redirect("pakar")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pakar $pakar)
    {
        return view('pakar/edit-pakar', compact('pakar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pakar $pakar)
    {
        $request->validate([
            'nama_pakar' => 'required',
            'spesialis' => 'required',
        ]);

        $pakar->update([
            'nama_pakar' => $request->nama_pakar,
            'spesialis'  => $request->spesialis,
        ]);
        return redirect("pakar")->with("message", "Data berhasil disimpan");
    }

    public function print()
    {
        $pakar = Pakar::all();
        $pdf = Pdf::loadview('pakar/laporan-pakar', ['pakar' => $pakar])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pakar.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pakar $pakar)
    {
        $pakar->delete();
        return redirect("pakar")->with("message", "Data berhasil dihapus");
    }

    public function getDetails($id = 0)
    {
        $data = Pakar::where('id_pakar', $id)->first();
        return response()->json($data);
    }
}
