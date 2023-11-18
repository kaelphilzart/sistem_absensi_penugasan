<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index(){
        $data = Riwayat::all();
    return view('riwayat.index', ['dataRiwayat' => $data]);
    }

    public function pdfRiwayat(){
        $data = Riwayat::all();
        return view('riwayat.pdfRiwayat', ['dataRiwayat' => $data]);
    }
}
