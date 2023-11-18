<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\LeaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// css 
Route::get('/css/style.css', function () {
    return response(file_get_contents(public_path('assets/css/style.css')))->header('Content-Type', 'text/css');
});
Route::get('/css/material-dashboard.css?v=3.1.0', function () {
    return response(file_get_contents(public_path('assets/css/material-dashboard.css?v=3.1.0')))->header('Content-Type', 'text/css');
});
// Route::get('/css/sb-admin-2.min.css', function () {
//     return response(file_get_contents(public_path('assets/css/sb-admin-2.min.css')))->header('Content-Type', 'text/css');
// });
// Route::get('/fontawesome-free/css/all.min.css', function () {
//     return response(file_get_contents(public_path('vendor/fontawesome-free/css/all.min.css')))->header('Content-Type', 'text/css');
// });
// Route::get('/img/logo-aptikma.png', function () {
//     return response(file_get_contents(public_path('assets/img/logo-aptikma.png')))->header('Content-Type', 'file/png');
// });
// Route::get('/img/logo-sidebar.png', function () {
//     return response(file_get_contents(public_path('assets/img/logo-sidebar.png')))->header('Content-Type', 'file/png');
// });

    // Route::middleware(['auth','ceklevel:admin, leader'])->group(function(){

       
    //     // Route::get('filter-menu', [PenjualanController::class, 'index']);
    //     Route::get('filter-menu', [PenjualanController::class, 'tampilMenu']) -> name('filter-menu');
    //     Route::get('/register', [RegisterController::class, 'create']);
    //     Route::post('/register2', [RegisterController::class, 'store']);

    //     
    //     Route::post('tampil-presensi', [PresensiController::class, 'store']) -> name('presensi.store');
    //     Route::get('tambah-presensi', [PresensiController::class, 'index_stand']) -> name('presensi.create');
    //     Route::get('cetakPdfPresensi', [PresensiController::class, 'pdfPresensi']) ->name('pdfPresensi');

    //     Route::post('/hitung', [PenjualanController::class, 'hitung'])->name('hitung');
    //     Route::get('tampil-penjualan', [PenjualanController::class, 'index']);
    //     Route::get('cetakPdfPenjualan', [PenjualanController::class, 'pdfPenjualan']) ->name('pdfPenjualan');
    //     Route::get('cari-penjualan', [PenjualanController::class, 'search']) ->name('cari-penjualan');

    //     Route::get('finish', [TotalController::class, 'calculate']) ->name('finish');
        
    // Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');
	// Route::get('/user-profile', [InfoUserController::class, 'create']);
	// Route::post('/user-profile', [InfoUserController::class, 'store']);
    // Route::get('/login', function () {
	// 	return view('dashboard');
	// })->name('sign-up');
        
    // });



    Route::middleware(['auth'])->group(function () {
        // Rute untuk pengguna dengan tingkat 'admin'


        Route::middleware(['admin'])->group(function () {
            
        Route::get('/', [HomeController::class, 'home']);
        Route::get('home', function () {
            return view('home');
        })->name('home');


        Route::get('tampil-pengguna', [AdminController::class, 'indexUser'])-> name('admin.tampil-pengguna');
        Route::get('tambah-pengguna', [AdminController::class, 'createUser']) -> name('admin.create');
        Route::post('/pengguna/edit/{id}', [AdminController::class, 'updateUser']) -> name('admin.update-pengguna');
        Route::post('/pengguna/delete/{id}', [AdminController::class, 'destroyUser']) -> name('admin.destroy-pengguna');
        Route::post('tambah-pengguna', [AdminController::class, 'tambahPengguna']) -> name('admin.tambah-pengguna');
        Route::get('/pengguna/edit/{id}', [AdminController::class, 'editUser']) -> name('admin.edit-pengguna');

        Route::get('tampil-leader', [AdminController::class, 'indexLeader'])-> name('admin.tampil-leader');
        Route::post('tambah-leader', [AdminController::class, 'createLeader']) -> name('admin.create-leader');
        Route::post('/leader/delete/{id}', [AdminController::class, 'destroyLeader']) -> name('admin.destroy-leader');
        Route::get('/leader/edit/{id}', [AdminController::class, 'editLeader']) -> name('admin.edit-leader');
        Route::post('/leader/edit/{id}', [AdminController::class, 'updateLeader']) -> name('admin.update-leader');


        Route::get('tampil-magang', [AdminController::class, 'indexMagang'])-> name('admin.tampil-magang');
        Route::post('tambah-magang', [AdminController::class, 'createMagang']) -> name('admin.create-magang');
        Route::post('/magang/delete/{id}', [AdminController::class, 'destroyMagang']) -> name('admin.destroy-magang');
        Route::get('/magang/edit/{id}', [AdminController::class, 'editMagang']) -> name('admin.edit-magang');
        Route::post('/magang/edit/{id}', [AdminController::class, 'updateMagang']) -> name('admin.update-magang');


        Route::get('tampil-bidang', [AdminController::class, 'indexBidang'])-> name('admin.tampil-bidang');
        Route::get('tambah-bidang', [AdminController::class, 'createBidang']) -> name('admin.create-bidang');
        Route::post('tambah-bidang', [AdminController::class, 'tambahBidang']) -> name('admin.tambah-bidang');
        Route::post('/bidang/delete/{id}', [AdminController::class, 'destroyBidang']) -> name('admin.destroy-bidang');
        Route::get('/bidang/edit/{id}', [AdminController::class, 'editBidang']) -> name('admin.edit-bidang');

        Route::get('logout-admin', [SessionsController::class, 'destroyAdmin'])->name('logout-admin');
        });
    
        // Rute untuk pengguna dengan tingkat 'leader'
        Route::middleware(['leader'])->group(function () {

            // Route::get('/', [HomeController::class, 'homeLeader']);
            
            Route::get('home_leader', function () {
                return view('home_leader');
            })->name('home_leader');


            Route::get('anggota-magang', [LeaderController::class, 'Magang'])->name('anggota-magang');
            Route::get('pengerjaan-tugas', [LeaderController::class, 'indexPengerjaan'])->name('pengerjaan-tugas');
            Route::get('riwayat-absen', [PresensiController::class, 'index'])->name('riwayat-absen');

            Route::get('tampil-task', [TaskController::class, 'indexLeader'])->name('leader.task');
            Route::get('tambah-task', [TaskController::class, 'createTask'])->name('create-task');
            Route::post('buat-task', [TaskController::class, 'buatTugas']) -> name('buat-task');
            Route::post('/task/delete/{id}', [TaskController::class, 'destroyTask']) -> name('task.hapus-task');
            Route::get('logout-leader', [SessionsController::class, 'destroyLeader'])->name('logout-leader');
        });
    
        // Rute untuk pengguna dengan tingkat 'magang'
        Route::middleware(['magang'])->group(function () {

            Route::get('home_magang', function () {
                return view('home_magang');
            })->name('home_magang');

            Route::get('tampil-absen', [PresensiController::class, 'indexMagang']) -> name('tampil-absen');
            Route::post('isi-absen', [PresensiController::class, 'store']) -> name('isi-absen');
            Route::get('tampil-tugas', [TaskController::class, 'indexMagang'])->name('magang.task');

            Route::post('numpuk-tugas', [TaskController::class, 'numpukTugas']) -> name('numpuk-tugas');
           
            Route::get('logout-magang', [SessionsController::class, 'destroyMagang'])->name('logout-magang');
       
        });
    
        
    });
    
    



    Route::group(['middleware' => 'guest'], function () {

        Route::get('register', [SessionsController::class, 'register'])->name('register');
        Route::post('create-user', [SessionsController::class, 'createUser'])->name('create-user');
        Route::get('/login', [SessionsController::class, 'create'])->name('login');
        Route::post('session', [SessionsController::class, 'store'])->name('session');
        Route::get('/login/forgot-password', [ResetController::class, 'create']);
        Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
        Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
        Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    
    });
    Route::get('/login', function () {
        return view('session/login-session');
    })->name('login');
    Route::get('/latihan', function () {
        return view('layouts/sidebar');
    })->name('latihan');