<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Penyakit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosa = Diagnosa::join('tb_penyakit', 'tb_penyakit.kode_penyakit', 'tb_diagnosa.kode_penyakit')
            ->select('tb_diagnosa.*', 'tb_penyakit.keterangan as keterangan_penyakit', 'tb_penyakit.penyakit as penyakit')
            ->paginate(10);
        return view('diagnosa/diagnosa', compact('diagnosa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['gejala'] = Gejala::all();
        return view('diagnosa/tambah-diagnosa', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_gejala = $request->input('kode_gejala');

        if (in_array(1, $kode_gejala) && in_array(2, $kode_gejala) && in_array(3, $kode_gejala) && in_array(4, $kode_gejala)) {
            $penyakit = 'Maag';
        } else if (in_array(5, $kode_gejala) && in_array(6, $kode_gejala) && in_array(7, $kode_gejala) && in_array(2, $kode_gejala)) {
            $penyakit = 'Diare';
        } else if (in_array(1, $kode_gejala) && in_array(8, $kode_gejala) && in_array(9, $kode_gejala) && in_array(10, $kode_gejala)) {
            $penyakit = 'Cacingan';
        } else  if (in_array(8, $kode_gejala) && in_array(11, $kode_gejala) && in_array(12, $kode_gejala) && in_array(13, $kode_gejala)) {
            $penyakit = 'Sembelit';
        } else  if (in_array(1, $kode_gejala) && in_array(8, $kode_gejala) && in_array(9, $kode_gejala) && in_array(14, $kode_gejala) && in_array(15, $kode_gejala)) {
            $penyakit = 'Gastritis';
        }

        $p = Penyakit::where('penyakit', $penyakit)->first();
        Diagnosa::create([
            'kode_diagnosa' => rand(),
            'kode_penyakit'  => $p->kode_penyakit,
            'keterangan' => $request->keterangan,
            'penanganan' => $request->penanganan,
        ]);
        return redirect("diagnosa")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function print()
    {
        $diagnosa = Diagnosa::join('tb_penyakit', 'tb_penyakit.kode_penyakit', 'tb_diagnosa.kode_penyakit')
            ->select('tb_diagnosa.*', 'tb_penyakit.keterangan as keterangan_penyakit', 'tb_penyakit.penyakit as penyakit')->get();
        $pdf = Pdf::loadview('diagnosa/laporan-diagnosa', ['diagnosa' => $diagnosa])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-diagnosa$diagnosa.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnosa $diagnosa)
    {
        $data['gejala'] = Gejala::all();
        return view('diagnosa/edit-diagnosa', compact('diagnosa'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        $request->validate([
            'kode_penyakit' => 'required',
            'penyakit' => 'required',
            'keterangan' => 'required',
            'penanganan' => 'required',
        ]);

        $diagnosa->update([
            'kode_penyakit'  => $request->kode_penyakit,
            'penyakit'  => $request->penyakit,
            'keterangan' => $request->keterangan,
            'penanganan' => $request->penanganan,
        ]);
        return redirect("diagnosa")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnosa $diagnosa)
    {
        $diagnosa->delete();
        return redirect("diagnosa")->with("message", "Data berhasil dihapus");
    }
}
