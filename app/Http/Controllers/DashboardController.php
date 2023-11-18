<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Penjualan;
use App\Models\Stand;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
class DashboardController extends Controller
{
    public function index(){

        $totalKaryawan = User :: where ('level','=','karyawan')->count();
        $totalPelanggan = Penjualan :: count();
        $totalStand = Stand :: count();
        // $penghasilanKeseluruhan = Penjualan :: where('total') ->count();
        
        $todayDate = Carbon::now()->format('d-m-y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon:: now()->format('y');
        

        $dataOmset = Penjualan::sum('total');
        $todayOmset = Penjualan::whereDate('tanggal', $todayDate)->sum('total');
        $thisMonthOmset = Penjualan::whereDate('tanggal', $thisMonth)->sum('total');
        $thisYearOmset = Penjualan::whereDate('tanggal', $thisYear)->sum('total');
        return view ('dashboard', compact('totalKaryawan','dataOmset','totalStand','totalPelanggan',
                                            'todayOmset','thisMonthOmset','thisYearOmset'));

        Blade::directive('currency', function ( $expression ) 
        { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
    }
    
}
