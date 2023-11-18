<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    public function home()
    {
        
        return redirect('home');
    }

    public function homeLeader()
    {

        $user = Auth::user();

        // Mengambil data leader yang terkait dengan pengguna yang telah login
        $leader = $user->leader;
    
        // Mengambil kolom "bidang" dari data leader
        $bidang = $leader->bidang;
    
        return view('home_leader', ['bidang' => $bidang]);
    }
    
    public function homeMagang()
    {
        
        return redirect('home_magang');
    }
    
    }

