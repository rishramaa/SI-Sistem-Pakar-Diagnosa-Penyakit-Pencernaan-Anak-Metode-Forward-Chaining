<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = Gejala::paginate(10);
        return view('gejala/gejala', compact('gejala'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gejala/tambah-gejala');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required',
            'gejala' => 'required',
            'keterangan' => 'required',
        ]);

        Gejala::create([
            'kode_gejala' => $request->kode_gejala,
            'gejala'  => $request->gejala,
            'keterangan' => $request->keterangan,
        ]);
        return redirect("gejala")->with("message", "Data berhasil disimpan");
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
    public function edit(Gejala $gejala)
    {
        return view('gejala/edit-gejala', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'gejala' => 'required',
            'keterangan' => 'required',
        ]);

        $gejala->update([
            'gejala'  => $request->gejala,
            'keterangan'  => $request->keterangan,
        ]);
        return redirect("gejala")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect("gejala")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $gejala = Gejala::all();
        $pdf = Pdf::loadview('gejala/laporan-gejala', ['gejala' => $gejala])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-gejala.pdf');
    }

    public function getDetails($id = 0)
    {
        $data = Gejala::where('kode_gejala', $id)->first();
        return response()->json($data);
    }
}
