<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::paginate(10);
        return view('penyakit/penyakit', compact('penyakit'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyakit/tambah-penyakit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required',
            'penyakit' => 'required',
            'keterangan' => 'required',
        ]);

        Penyakit::create([
            'kode_penyakit'  => $request->kode_penyakit,
            'penyakit'  => $request->penyakit,
            'keterangan' => $request->keterangan,
        ]);
        return redirect("penyakit")->with("message", "Data berhasil disimpan");
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
    public function edit(Penyakit $penyakit)
    {
        return view('penyakit/edit-penyakit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'penyakit' => 'required',
            'keterangan' => 'required',
        ]);

        $penyakit->update([
            'penyakit'  => $request->penyakit,
            'keterangan' => $request->keterangan,
        ]);
        return redirect("penyakit")->with("message", "Data berhasil disimpan");
    }

    public function print()
    {
        $penyakit = Penyakit::all();
        $pdf = Pdf::loadview('penyakit/laporan-penyakit', ['penyakit' => $penyakit])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-penyakit.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect("penyakit")->with("message", "Data berhasil dihapus");
    }

    public function getDetails($id = 0)
    {
        $data = Penyakit::where('kode_penyakit', $id)->first();
        return response()->json($data);
    }
}
