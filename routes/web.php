<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// 1. HALAMAN UTAMA (Otomatis lempar ke login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. LOGIKA AUTENTIKASI LANGSUNG (Bypass Controller)
Route::middleware('guest')->group(function () {
    
    // Tampilkan Form Login murni
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    // Proses data Login masuk
    Route::post('login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    });

    // Tampilkan Form Register murni
    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    // Proses data Register baru
    Route::post('register', function (Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max::255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/beranda');
    });
});

// 3. RUTE DASHBOARD YANG DIKUNCI (Harus Login)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/beranda', function () {
        $semuaBarang = \App\Models\Barang::all();
        $totalStok = \App\Models\Barang::sum('stok');
        return view('beranda', compact('semuaBarang', 'totalStok'));
    })->name('beranda');

    Route::resource('barang', BarangController::class);

    // Proses data Keluar / Logout
    Route::post('logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
