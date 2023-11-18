<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($attributes)) {
            $user = Auth::user(); // Mendapatkan objek pengguna yang berhasil login
            session()->regenerate();
    
            if ($user->level == 'admin') {
                return redirect('home')->with(['success' => 'You are logged in as admin.']);
            } elseif ($user->level == 'leader') {
                return redirect('home_leader')->with(['success' => 'You are logged in as leader.']);
            } elseif ($user->level == 'magang') {
                return redirect('home_magang')->with(['success' => 'You are logged in as magang.']);
            } else {
                return redirect('home')->with(['success' => 'You are logged in as a general user.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
    }
    
    public function destroyAdmin()
    {
        Auth::logout();
        
        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }

    public function destroyLeader()
    {
        Auth::logout();
        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }

    public function destroyMagang()
    {
        Auth::logout();
        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }

    public function register()
    {
        return view('session.register');
    }

    public function createUser()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'level' => ['required']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        
        $user = User::create($attributes);
        Auth::login($user); 
        return redirect('home');
    }
    // public function createUser(Request $request){
    //     //validasi form
    //     $message= [
    //         'required' =>':attribute tidak boleh kosong',
    //         'unique' => 'attribute sudah digunakan',
    //     ];

    //     $attributes = request()->validate([
    //         'name' => 'required',
    //         'level' => 'required',
    //         'email' => 'required|unique:email',
    //         'password' => 'required',
    //     ], $message);
        
    //     $attributes['password'] = bcrypt($attributes['password'] );

    //     $data = new User;
    //     $data->name = $request->name;
    //     $data->level = $request->level;
    //     $data->email = $request->email;
    //     $data->password = $request->password;
    //     $data->save($attributes);
    //     return redirect('/data-admin')->with('success', 'Data berhasil disimpan');;
    // }
}

