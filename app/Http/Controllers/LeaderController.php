<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledear;
use App\Models\Bidang;
use App\Models\Magang;
use App\Models\Hasil;
use App\Models\Task;


class LeaderController extends Controller
{
    //
    // public function indexMagang()
    // {
    //     $data = Magang::join('users', 'anak_magang.id_user', '=', 'users.id')
    //                     ->join('bidang', 'anak_magang.id_minat', '=', 'bidang.id_bidang')
    //                     ->get();
    //     return view('anak_magang', [
    //         'dataMagang' => $data,
    //     ]);
    // }

    public function Magang()
    {
        $data = Magang::join('users', 'anak_magang.id_user', '=', 'users.id')
                        ->join('bidang', 'anak_magang.id_minat', '=', 'bidang.id_bidang')
        ->get();                    
            return view('anak_magang', [
            'dataMagang' => $data,
        ]);
    }
    public function indexPengerjaan()
    {
        $data = Hasil::join('users', 'hasil.id_user', '=', 'users.id')
                        ->join('tasks', 'hasil.id_task', '=', 'tasks.id')
                        ->get();
        return view('pengerjaan-tugas', [
            'dataPengerjaan' => $data,
        ]);
    }   
    
}
