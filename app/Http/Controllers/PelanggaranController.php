<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggarans = Pelanggaran::all();
        return view('pelanggaran.index', compact('pelanggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'siswa_id'          =>  'required',
            'pelanggaran'       =>  'required',
            'catatan'           =>  'required',
            'tgl_pelanggaran'   =>  'required',
            'tindakan'          =>  'required',
        ]);

        Pelanggaran::create($request->all());

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'          =>  'required',
            'pelanggaran'       =>  'required',
            'catatan'           =>  'required',
            'tgl_pelanggaran'   =>  'required',
            'tindakan'          =>  'required',

        ]);

        Pelanggaran::create($request->all());

        return redirect()->route('pelanggaran.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggaran $pelanggaran)
    {
        return view('pelanggaran.show', compact('pelanggaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        return view('pelanggaran.edit', compact('pelanggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'siswa_id'          =>  'required',
            'pelanggaran'       =>  'required',
            'catatan'           =>  'required',
            'tgl_pelanggaran'   =>  'required',
            'tindakan'          =>  'required',

        ]);

        $query = DB::table('siswas')->where('id', $id)->update([
            'siswa_id'           =>  $request['siswa_id'],
            'pelanggaran'        =>  $request['pelanggaran'],
            'catatan'            =>  $request['catatan'],
            'tgl_pelanggaran'    =>  $request['tgl_pelanggaran'],
            'tindakan'           =>  $request['tindakan'],
        ]);

        return redirect()->route('siswa.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $query = Db::table('siswas')->where('id', $id)->delete();
        return redirect()->route('siswa.index');
    }
}
