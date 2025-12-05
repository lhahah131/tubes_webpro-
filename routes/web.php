<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    // In a real app, you would validate credentials here.
    // For now, we mock the login and redirect based on role.
    
    $role = $request->input('role');
    
    // Simulate auth check - accept any input for demonstration
    if ($role === 'siswa') {
        // Validation logic for Siswa (NISN)
        // Auth::login($student);
        return redirect()->route('dashboard', ['role' => 'siswa']);
    } elseif ($role === 'guru') {
        // Validation logic for Guru (NIP/Email)
        // Auth::login($teacher);
        return redirect()->route('dashboard', ['role' => 'guru']);
    }
    
    return back()->with('error', 'Login failed');
})->name('login.store');

Route::get('/dashboard/{role?}', function ($role = 'siswa') {
    return view('dashboard', ['role' => $role]);
})->name('dashboard');

// Registration Routes
Route::get('/register/siswa', function () {
    return view('auth.register_siswa');
})->name('register.siswa');

Route::post('/register/siswa', function (\Illuminate\Http\Request $request) {
    // Mock registration logic
    // In real app: Validate input, create User/Student record, handle file uploads
    
    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
})->name('register.siswa.store');

Route::get('/register/guru', function () {
    return view('auth.register_guru');
})->name('register.guru');

Route::post('/register/guru', function (\Illuminate\Http\Request $request) {
    // Mock registration logic for teachers
    return redirect()->route('login')->with('success', 'Registrasi Guru berhasil! Silakan login.');
})->name('register.guru.store');
