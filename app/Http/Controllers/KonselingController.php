<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Guru_BK;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function history($siswa_id) {
        $siswa = Siswa::where('user_id', $siswa_id)->pluck('id');
        $history = Konseling::where('siswa_id', $siswa)->get();
        return view('konseling.history', compact('history'));
    }

    public function index() {
        $konseling = Konseling::where('status', 'diterima')->get();
        $konsulDone = Konseling::where('status', 'selesai')->get();
        $konsulDecline = Konseling::where('status', 'ditolak')->get();
        return view('konseling.index', compact('konseling', 'konsulDone', 'konsulDecline'));
    }

    public function create() {
        $guru_bk = Guru_BK::all();
        return view('konseling.create', compact('guru_bk'));
    }

    public function store(Request $request, Konseling $konseling) {
        $request->validate([
            'siswa_id' => 'required',
            'guruBk_id' => 'required',
            'tgl_konseling' => 'required',
            'keluhan' => 'required',
            'hasil_konseling' => 'sometimes',
            'status' => 'required',
        ]);

        // Konseling::create($request->all());
        Konseling::create([
            'siswa_id' => $request['siswa_id'],
            'guruBk_id' => $request['guruBk_id'],
            'tgl_konseling' => $request['tgl_konseling'],
            'keluhan' => $request['keluhan'],
            'hasil_konseling' => '',
            'status' => $request['status'],
        ]);
        return redirect()->route('konseling.history', Auth::user()->id);
    }

    public function requestKonsul($guru_id) {
        $guru = Guru_BK::where('user_id', $guru_id)->pluck('id');
        $gurubk = Konseling::where('guruBk_id', $guru)->get();
        $pending = $gurubk->where('status', 'pending');
        return view('konseling.request', compact('pending'));
    }

    public function tolakReq($konseling_id) {
        $tolak = Konseling::where('id', $konseling_id)->get();
        // dd($tolak[0]);
        $tolak[0]->update([
            'status' => 'ditolak'
        ]);

        return redirect()->route('konseling.index');
    }

    public function terimaReq($konseling_id) {
        $terima = Konseling::where('id', $konseling_id)->get();
        $terima[0]->update([
            'status' => 'diterima'
        ]);

        return redirect()->route('konseling.index');
    }
}
