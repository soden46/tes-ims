<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index()
    {
        return view('angsuran');
    }

    public function hitungAngsuran(Request $request)
    {
        $otr = $request->input('otr');
        $dp = $request->input('dp');
        $jangka_waktu = $request->input('jangka_waktu');

        $pokok_utang = $otr - $dp;

        if ($jangka_waktu <= 12) {
            $bunga = 0.12; // 12%
        } elseif ($jangka_waktu > 12 && $jangka_waktu <= 24) {
            $bunga = 0.14; // 14%
        } else {
            $bunga = 0.165; // 16,5%
        }

        $total_bunga = $pokok_utang * $bunga;
        $total_pokok_dan_bunga = $pokok_utang + $total_bunga;
        $angsuran_per_bulan = $total_pokok_dan_bunga / $jangka_waktu;

        return view('angsuran', [
            'angsuran_per_bulan' => $angsuran_per_bulan,
            'pokok_utang' => $pokok_utang,
            'total_bunga' => $total_bunga,
            'total_pokok_dan_bunga' => $total_pokok_dan_bunga,
            'jangka_waktu' => $jangka_waktu
        ]);
    }
}
