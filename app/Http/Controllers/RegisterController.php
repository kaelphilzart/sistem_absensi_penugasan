<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function createUserAdmin()
    {
        return view('laravel-examples.create-user');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'level' => ['required']
            // 'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        

        session()->flash('success', 'Data berhasil ditambahkan');
        $user = User::create($attributes);
        Auth::login($user); 
        return redirect('home');
    }

    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        return redirect('/tampil-karyawan')->with('success', 'Data berhasil dihapus');;
    }

    // public function storeAdmin()
    // {
    //     $attributes = request()->validate([
    //         'name' => ['required', 'max:50'],
    //         'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
    //         'password' => ['required', 'min:5', 'max:20'],
    //         'phone' => ['required', 'max:14'],
    //         'alamat' => ['required', 'max:50'],
    //         'Foto' => ['required'],
    //         'Foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
    //         'agreement' => ['accepted']
    //     ]);
    //     $attributes['password'] = bcrypt($attributes['password'] );

        
    //     User::create($request->all());
    //     return redirect()->route('/user-management')
    //                      ->with('success','Data berhasil ditambahkan');
    // }
}
