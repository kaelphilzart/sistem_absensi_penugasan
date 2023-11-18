<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Leader;
use App\models\Bidang;
use App\models\Magang;
use App\models\Peserta;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function indexUser(){
        $data = User::all();
    return view('admin.index_user', ['dataUser' => $data]);
    }

    public function createUser(){
        return view('admin.create_user');
    }

    public function editUser($id){
        $data = User::find($id);
        return view('admin.edit_user', compact('data'));
    }

    public function updateUser(Request $request, $id){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ], $message);

        $data = user::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->level = $request->level;
        $data->update();
        return redirect('tampil-pengguna')->with('success', 'Pengguna berhasil diubah');;
    }

    public function destroyUser($id){
        $data = user::find($id);
        $data->delete();
        return redirect('tampil-pengguna')->with('success', 'Pengguna berhasil dihapus');;
    }

    public function tambahPengguna(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
        ];

        $attributes = request()->validate([
            'name' => 'required',
            'level'=> 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ], $message);
        
        $attributes['password'] = bcrypt($attributes['password'] );

        $data = new user;
        $data->name = $request->name;
        $data->level = $request->level;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save($attributes);
        return redirect('tampil-pengguna')->with('success', 'Pengguna berhasil disimpan');;
    }

        //leader
    public function indexLeader()
    {
        $data = Leader::join('users', 'leader.id_user', '=', 'users.id')
                        ->join('bidang', 'leader.id_bidang', '=', 'bidang.id_bidang')
        ->get();                    
        $data2 = Bidang::all();
        $data1 = User::where('level', 'leader')
        ->whereDoesntHave('leader')
        ->get();
    
    
        return view('admin.index_Leader', [
            'dataLeader' => $data,
            'dataUser' => $data1,
            'dataBidang' => $data2,
        ]);
    }
    
    public function createLeader(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required', // Pastikan validasi sesuai dengan kebutuhan Anda.
            'id_bidang' => 'required',
        ]);
    
        $userId = $request->input('user_id');
    
        // Pastikan user belum menjadi leader (cek kembali untuk menghindari duplikasi).
        if (!Leader::where('id_user', $userId)->exists()) {
            Leader::create([
                'id_user' => $userId,
                'id_bidang' => $request->input('id_bidang'),
            ]);
    
            return redirect('tampil-leader')->with('success', 'Berhasil Menjadi Leader');
        }
    
        return redirect('tampil-leader')->with('error', 'User sudah menjadi leader');
    }


    public function editLeader($id){
        $data = Leader::join('bidang', 'leader.id_bidang', '=', 'bidang.id_bidang')
            ->where('leader.id_leader', $id)
            ->first();
    
        $data1 = Bidang::all();
    
        return view('admin.edit_Leader', compact('data', 'data1'));
    }
    

    public function updateLeader(Request $request, $id){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id_bidang' => 'required',
            ], $message);

        $data = Leader::find($id);
        $data->id_bidang = $request->id_bidang;
        $data->update();
        return redirect('tampil-leader')->with('success', 'Leader berhasil diubah');;
    }

    public function destroyLeader($id){
        $data = Leader::find($id);
        $data->delete();
        return redirect('tampil-leader')->with('success', 'Leader berhasil dihapus');;
    }

        //bidang

    public function createBidang(){
            return view('admin.create_bidang');
    }

    public function indexBidang(){
        $data = Bidang::all();
    return view('admin.index_bidang', ['dataBidang' => $data]);
    }

    public function tambahBidang(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
        ];

        $attributes = request()->validate([
            'bidang' => 'required|unique:bidang',
            'deskripsi' => 'required',
        ], $message);

        $data = new Bidang;
        $data->bidang = $request->bidang;
        $data->deskripsi = $request->deskripsi;
        $data->save($attributes);
        return redirect('tampil-bidang')->with('success', 'Bidang berhasil ditambahkan');;
    }

    public function destroyBidang($id){
        $data = Bidang::find($id);
        $data->delete();
        return redirect('tampil-bidang')->with('success', 'Bidang berhasil dihapus');;
    }

    // Anak Magang

    public function indexMagang()
    {
        $data = Magang::join('users', 'anak_magang.id_user', '=', 'users.id')
                        ->join('bidang', 'anak_magang.id_minat', '=', 'bidang.id_bidang')
        ->get();                    
        $data2 = Bidang::all();
        $data1 = User::where('level', 'magang')
        ->whereDoesntHave('magang')
        ->get();
    
    
        return view('admin.index_magang', [
            'dataMagang' => $data,
            'dataUser' => $data1,
            'dataBidang' => $data2,
        ]);
    }
    
    public function createMagang(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required', // Pastikan validasi sesuai dengan kebutuhan Anda.
            'id_minat' => 'required',
        ]);
    
        $userId = $request->input('user_id');
    
        // Pastikan user belum menjadi leader (cek kembali untuk menghindari duplikasi).
        if (!Magang::where('id_user', $userId)->exists()) {
            Magang::create([
                'id_user' => $userId,
                'id_minat' => $request->input('id_minat'),
            ]);
    
            return redirect('tampil-magang')->with('success', 'Berhasil Menjadi Anak Magang');
        }
    
        return redirect('tampil-magang')->with('error', 'User sudah menjadi anak magang');
    }


    public function editMagang($id){
        $data = Magang::join('bidang', 'anak_magang.id_minat', '=', 'bidang.id_bidang')
            ->where('anak_magang.id_magang', $id)
            ->first();
    
        $data1 = Bidang::all();
    
        return view('admin.edit_magang', compact('data', 'data1'));
    }
    

    public function updateMagang(Request $request, $id){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id_minat' => 'required',
            ], $message);

        $data = Magang::find($id);
        $data->id_minat = $request->id_minat;
        $data->update();
        return redirect('tampil-magang')->with('success', 'Leader berhasil diubah');;
    }

    public function destroyMagang($id){
        $data = Magang::find($id);
        $data->delete();
        return redirect('tampil-magang')->with('success', 'Leader berhasil dihapus');;
    }

}
