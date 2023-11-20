<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'               =>  'required|numeric',
            'nama'              =>  'required',
            'alamat'            =>  'required',
            'kelas'             =>  'required',
            'tgl_lahir'         =>  'required',
            'jenis_kelamin'     =>  'required',
            'no_telp_ortu'      =>  'required',
            'agama'             =>  'required',
            'tahun_angkatan'    =>  'required|numeric'
        ]);

        Siswa::create($request->all());

        // $query = DB::table('siswas')->insert([
        //     'nis'               =>  $request['nis'],
        //     'nama'              =>  $request['nama'],
        //     'alamat'            =>  $request['alamat'],
        //     'kelas'             =>  $request['kelas'],
        //     'tgl_lahir'         =>  $request['tgl_lahir'],
        //     'jenis_kelamin'     =>  $request['jenis_kelamin'],
        //     'agama'             =>  $request['agama'],
        //     'tahun_angkatan'    =>  $request['tahun_angkatan'],
        // ]);

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        // $siswas = DB::table ('siswas') ->get();
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        // $siswas = DB::table('siswas')->where('id', $id)->get();
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nis'               =>  'required|numeric',
            'nama'              =>  'required',
            'alamat'            =>  'required',
            'kelas'             =>  'required',
            'tgl_lahir'         =>  'required',
            'jenis_kelamin'     =>  'required',
            'no_telp_ortu'      =>  'required',
            'agama'             =>  'required',
            'tahun_angkatan'    =>  'required|numeric'
        ]);

        $query = DB::table('siswas')->where('id', $id)->update([
            'nis'               =>  $request['nis'],
            'nama'              =>  $request['nama'],
            'alamat'            =>  $request['alamat'],
            'kelas'             =>  $request['kelas'],
            'tgl_lahir'         =>  $request['tgl_lahir'],
            'jenis_kelamin'     =>  $request['jenis_kelamin'],
            'no_telp_ortu'      =>  $request['no_telp_ortu'],
            'agama'             =>  $request['agama'],
            'tahun_angkatan'    =>  $request['tahun_angkatan']
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id )
    {
        $query = Db::table('siswas')->where('id', $id)->delete();
        return redirect()->route('siswa.index');
    }
}
