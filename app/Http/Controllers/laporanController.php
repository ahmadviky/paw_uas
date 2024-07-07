<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tahun_terbit = Buku::selectRaw('count(*) as count, tahun_terbit as label')->groupBy('tahun_terbit')->get();
        return view('laporan.dashboard', [
            'tahun_terbit' => $tahun_terbit
        ]);
    }
}
