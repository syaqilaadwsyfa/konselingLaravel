<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
        ]);

        $query = DB::table('kelas')->insert([
            'kelas' => $request['kelas'],
        ]);

        return redirect()->route('kelas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kelas = DB::table('kelas')->where('id', $id)->first();
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kelas = DB::table('kelas')->where('id', $id)->get();
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kelas' => 'required',
        ]);

        DB::table('kelas')->where('id', $id)->update([
            'kelas' => $request['kelas'],
        ]);

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kelas = DB::table('kelas')->where('id', $id)->delete();
        return redirect()->route('kelas.index');
    }
}
