<?php

namespace App\Http\Controllers;

use App\Models\Guru_BK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru_bks = Guru_BK::all();
        return view('guru_bk.index', compact('guru_bks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru_bk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'               =>  'required|numeric',
            'nama'              =>  'required',
            'no_telp'           =>  'required',
        ]);

        Guru_BK::create($request->all());

        // $query = DB::table('guru_bks')->insert([
        //     'nip'               =>  $request['nip'],
        //     'nama'              =>  $request['nama'],
        //     'no_telp'            =>  $request['no_telp'],
        // ]);

        return redirect()->route('guru_bk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru_BK $guru_BK)
    {
        $guru_bk = DB::table ('guru_bks') ->get();
        return view('guru_bk.show', compact('guru_bk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru_BK $guru_BK)
    {
        $guru_bk = DB::table ('guru_bks') ->get();
        return view('guru_bk.edit', compact('guru_bk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nip'               =>  'required|numeric',
            'nama'              =>  'required',
            'no_telp'           =>  'required|numeric',

        ]);

        $query = DB::table('guru_bks')->where('id', $id)->update([
            'nip'               =>  $request['nip'],
            'nama'              =>  $request['nama'],
            'no_telp'           =>  $request['no_telp'],
        ]);

        return redirect()->route('guru_bk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = Db::table('guru_bks')->where('id', $id)->delete();
        return redirect()->route('guru_bk.index');
    }
}
