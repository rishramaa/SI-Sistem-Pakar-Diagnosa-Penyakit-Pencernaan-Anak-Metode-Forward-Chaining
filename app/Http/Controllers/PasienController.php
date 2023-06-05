<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::paginate(10);
        return view('pasien/pasien', compact('pasien'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien/tambah-pasien');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        Pasien::create([
            'id_pasien' => $request->id_pasien,
            'nama'  => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect("pasien")->with("message", "Data berhasil disimpan");
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
    public function edit(Pasien $pasien)
    {
        return view('pasien/edit-pasien', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $pasien->update([
            'nama'  => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect("pasien")->with("message", "Data berhasil disimpan");
    }

    public function print()
    {
        $pasien = Pasien::all();
        $pdf = Pdf::loadview('pasien/laporan-pasien', ['pasien' => $pasien])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pasien.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect("pasien")->with("message", "Data berhasil dihapus");
    }

    public function getDetails($id = 0)
    {
        $data = Pasien::where('id_pasien', $id)->first();
        return response()->json($data);
    }
}
