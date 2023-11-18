<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class PresensiController extends Controller
{
    //
    public function index(){
        $data = Presensi::all();
    return view('presensi.index', ['dataPresensi' => $data]);
    }

    public function index_stand(){
        $data = Stand::all();
    return view('presensi.create', ['dataStand' => $data]);
    }
    public function indexMagang(){
        return view('presensi.create');
    }

    
   

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
         
            'id_user' => 'required',
            'status' => 'required',
            'tanggal' => 'required|date',
            'tgl' => 'required|date',
            // Validasi lainnya
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Memeriksa apakah data absensi sudah ada untuk tanggal yang sama
        $existingAbsensi = Presensi::where('tgl', $request->tgl)
            ->where('id_user', $request->id_user)
            ->first();
    
        if ($existingAbsensi) {
            return redirect('home_magang')->with('error', 'Anda sudah absen pada hari ini');
        }
    
        // Mendapatkan jam saat ini
        $now = Carbon::now();
    
        // Mengatur jam operasional (8 pagi)
        $jamMulai = Carbon::create(null, null, null, 8, 0, 0);
    
        // Menghitung selisih waktu
        $diff = $now->diff($jamMulai);
    
        // Menghitung total menit telat
        $menitTelat = $diff->h * 60 + $diff->i;
    
        // Menentukan keterangan (telat atau tepat waktu) dan formatnya
        if ($menitTelat > 0) {
            if ($menitTelat >= 60) {
                $telatJam = floor($menitTelat / 60);
                $telatMenit = $menitTelat % 60;
                $keterangan = 'Telat ' . $telatJam . ' jam ' . $telatMenit . ' menit';
            } else {
                $keterangan = 'Telat ' . $menitTelat . ' menit';
            }
            // Set waktu pulang jika telat (jam 5 plus waktu telat)
            $waktuPulang =  $now->copy()->setTime(17, 0, 0)->addMinutes($menitTelat);
        } else {
            $keterangan = 'Tepat Waktu';
            // Set waktu pulang pada jam 5
            $waktuPulang = $now->copy()->setTime(17, 0, 0);
        }
    
        // Tambahkan keterangan ke request
        $request['keterangan'] = $keterangan;
    
        // Set waktu pulang ke request
        $request['waktu_pulang'] =  $waktuPulang;
    
        // Data absensi belum ada, simpan data baru
        Presensi::create($request->all());
    
        return redirect('home_magang')->with('success', 'Absensi berhasil');
    }
    
    
    
    
    

    // public function edit($id){
    //     $data = pegawai::find($id);
    //     return view('pegawai.edit', compact('data'));
    // }

    // public function update(Request $request, $id){
    //     //validasi form
    //     $message= [
    //         'required' =>':attribute tidak boleh kosong',
    //         'unique' => 'attribute sudah digunakan',
    //         'numeric' => 'attribute harus berupa angka',
    //     ];

    //     $this->validate($request, [
    //         'id' => 'required|numeric',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required|numeric',
    //         'phone' => 'required',
    //         'alamat' => 'required',
    //     ], $message);

    //     $data = pegawai::find($id);
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->password = $request->password;
    //     $data->phone = $request->phone;
    //     $data->alamat = $request->alamat;
    //     $data->update();
    //     return redirect('/tampil-karyawan')->with('success', 'Data berhasil diubah');;
    // }

    // public function destroy($id){
    //     $data = pegawai::find($id);
    //     $data->delete();
    //     return redirect('/tampil-karyawan')->with('success', 'Data berhasil dihapus');;
    // }


    public function pdfPresensi(){
        $data = presensi::all();
        return view('Presensi.pdfPresensi', ['dataPresensi' => $data]);
    }
}
