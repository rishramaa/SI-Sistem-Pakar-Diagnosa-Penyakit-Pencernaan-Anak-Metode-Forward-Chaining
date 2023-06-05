<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aturan = Aturan::paginate(10);
        $aturan = Aturan::join('tb_penyakit', 'tb_penyakit.kode_penyakit', '=', 'tb_aturan.kode_penyakit')
            ->select('tb_aturan.*', 'tb_penyakit.*')
            ->paginate(10);
        return view('aturan/aturan', compact('aturan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["Penyakit"] = Penyakit::all();
        return view('aturan/tambah-aturan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aturan' => 'required',
            'list_gejala' => 'required',
            'kode_penyakit' => 'required',
            'penyakit' => 'required',
        ]);

        Aturan::create([
            'kode_aturan' => $request->kode_aturan,
            'list_gejala' => $request->list_gejala,
            'kode_penyakit' => $request->kode_penyakit,
            'penyakit' => $request->penyakit,
        ]);
        return redirect("aturan")->with("message", "Data berhasil disimpan");
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
    public function edit(Aturan $aturan)
    {
        $data["AturanSaatIni"] = Aturan::find($aturan->kode_aturan);
        $data["PenyakitSaatIni"] = Penyakit::find($aturan->kode_penyakit);
        $data["Penyakit"] = Penyakit::all();
        $data["Aturan"] = Aturan::all();
        return view('aturan/edit-aturan', compact('aturan'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aturan $aturan)
    {
        $request->validate([
            'list_gejala' => 'required',
            'kode_penyakit' => 'required',
            'penyakit' => 'required',
        ]);

        $aturan->update([
            'list_gejala'  => $request->list_gejala,
            'kode_penyakit' => $request->kode_penyakit,
            'penyakit'  => $request->penyakit,
        ]);
        return redirect("aturan")->with("message", "Data berhasil disimpan");
    }

    public function print()
    {
        $aturan = Aturan::join('tb_penyakit', 'tb_penyakit.kode_penyakit', '=', 'tb_aturan.kode_penyakit')
        ->select('tb_aturan.*', 'tb_penyakit.*')->get();
        $pdf = Pdf::loadview('aturan/laporan-aturan', ['aturan' => $aturan])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-aturan.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aturan $aturan)
    {
        $aturan->delete();
        return redirect("aturan")->with("message", "Data berhasil dihapus");
    }

    public function getDetails($id = 0)
    {
        $data = Aturan::where('kode_aturan', $id)->first();
        return response()->json($data);
    }
}
