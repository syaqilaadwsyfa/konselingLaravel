<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;

class PdfController extends Controller
{
    public function exportPdf()
    {
        // $pelanggarans = Pelanggaran::get_cfg_var();
        $pelanggarans = Pelanggaran::all();
        return view('pelanggaran.exportPdf', compact('pelanggarans'));
    }
}
