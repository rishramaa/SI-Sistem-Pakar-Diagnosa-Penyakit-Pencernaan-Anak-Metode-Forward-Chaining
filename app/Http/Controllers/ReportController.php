<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Report::paginate(10);
        $report = Report::join('tb_pakar', 'tb_pakar.id_pakar', '=', 'tb_report.id_pakar')
            ->join('tb_pasien', 'tb_pasien.id_pasien', '=', 'tb_report.id_pasien')
            ->join('tb_diagnosa', 'tb_diagnosa.kode_diagnosa', '=', 'tb_report.kode_diagnosa')
            ->join('tb_aturan', 'tb_aturan.kode_aturan', '=', 'tb_report.kode_aturan')
            ->join('tb_penyakit', 'tb_penyakit.kode_penyakit', '=', 'tb_report.kode_penyakit')
            ->select('tb_report.*', 'tb_pakar.*', 'tb_pasien.*', 'tb_diagnosa.*', 'tb_aturan.*', 'tb_penyakit.*' )
            ->paginate(10);
        return view('report/report', compact('report'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["Pakar"] = Pakar::all();
        $data["Pasien"] = Pasien::all();
        $data["Diagnosa"] = Diagnosa::all();
        $data["Gejala"] = Gejala::all();
        $data["Aturan"] = Aturan::all();
        $data["Penyakit"] = Penyakit::all();
        return view('report/tambah-report', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_report' => 'required',
            'id_pakar' => 'required',
            'nama_pakar' => 'required',
            'id_pasien' => 'required',
            'nama' => 'required',
            'kode_diagnosa' => 'required',
            'kode_aturan' => 'required',
            'list_gejala' => 'required',
            'kode_penyakit' => 'required',
            'penyakit' => 'required',

        ]);

        Report::create([
            'id_report' => rand(),
            'id_pakar'  => $request->id_pakar,
            'nama_pakar' => $request->nama_pakar,
            'id_pasien' => $request->id_pasien,
            'nama'  => $request->nama,
            'kode_diagnosa' => $request->kode_diagnosa,
            'kode_aturan' => $request->kode_aturan,
            'list_gejala'  => $request->list_gejala,
            'kode_penyakit' => $request->kode_penyakit,
            'penyakit'  => $request->penyakit,

        ]);
        return redirect("report")->with("message", "Data berhasil disimpan");
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
    public function edit(Report $report)
    {
        $data["PakarSaatIni"] = Pakar::find($report->id_pakar);
        $data["PasienSaatIni"] = Pasien::find($report->id_pasien);
        $data["DiagnosaSaatIni"] = Diagnosa::find($report->kode_diagnosa);
        $data["AturanSaatIni"] = Aturan::find($report->kode_aturan);
        $data["PenyakitSaatIni"] = Penyakit::find($report->kode_penyakit);
        $data["Pakar"] = Pakar::all();
        $data["Pasien"] = Pasien::all();
        $data["Diagnosa"] = Diagnosa::all();
        $data["Aturan"] = Aturan::all();
        $data["Penyakit"] = Penyakit::all();
        return view('report/edit-report', compact('report'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'id_report' => 'required',
            'id_pakar' => 'required',
            'nama_pakar' => 'required',
            'id_pasien' => 'required',
            'nama' => 'required',
            'kode_diagnosa' => 'required',
            'kode_aturan' => 'required',
            'list_gejala' => 'required',
            'kode_penyakit' => 'required',
            'penyakit' => 'required',

        ]);

        $report->update([
            'id_pakar'  => $request->id_pakar,
            'nama_pakar' => $request->nama_pakar,
            'id_pasien' => $request->id_pasien,
            'nama'  => $request->nama,
            'kode_diagnosa' => $request->kode_diagnosa,
            'kode_aturan' => $request->kode_aturan,
            'list_gejala'  => $request->list_gejala,
            'kode_penyakit' => $request->kode_penyakit,
            'penyakit'  => $request->penyakit,
        ]);
        return redirect("report")->with("message", "Data berhasil disimpan");
    }

    public function print()
    {
        $report = Report::join('tb_pakar', 'tb_pakar.id_pakar', '=', 'tb_report.id_pakar')
            ->join('tb_pasien', 'tb_pasien.id_pasien', '=', 'tb_report.id_pasien')
            ->join('tb_diagnosa', 'tb_diagnosa.kode_diagnosa', '=', 'tb_report.kode_diagnosa')
            ->join('tb_aturan', 'tb_aturan.kode_aturan', '=', 'tb_report.kode_aturan')
            ->join('tb_penyakit', 'tb_penyakit.kode_penyakit', '=', 'tb_report.kode_penyakit')
            ->select('tb_report.*', 'tb_pakar.*', 'tb_pasien.*', 'tb_diagnosa.*', 'tb_aturan.*', 'tb_penyakit.*' )->get();
        $pdf = Pdf::loadview('report/laporan-report', ['report' => $report])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-report.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect("report")->with("message", "Data berhasil dihapus");
    }

    public function getDetails($id = 0)
    {
        $data = Report::where('id_report', $id)->first();
        return response()->json($data);
    }
}
