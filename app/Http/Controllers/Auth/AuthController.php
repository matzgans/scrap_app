<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('pages.auth.register');
    }
    public function login(): View
    {
        return view('pages.auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function registerStore(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8|max:255',
                'role' => 'required',
            ]);


            // Simpan ke database
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role' => $validatedData['role'],
                'remember_token' => Str::random(60),
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'User berhasil disimpan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect back dengan error validasi
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (Exception $e) {
            // Log error lainnya
            Log::error('Error saat menyimpan user: ' . $e->getMessage());

            // Redirect back dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function loginStore(Request $request)
    {
        try {
            // Validasi input login
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Cek kredensial dan login
            if (Auth::attempt($request->only('email', 'password'))) {
                if (Auth::user()->role == "admin") {
                    # code...
                    return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
                } else {
                    return redirect()->route('user.dashboard')->with('success', 'Login berhasil');
                }
            }

            // Jika kredensial salah, beri pesan error
            return redirect()->route('auth.login')->withErrors(['error' => 'Kredensial yang Anda masukkan salah.']);
        } catch (Exception $e) {
            // Log error jika terjadi exception
            Log::error('Login failed: ' . $e->getMessage());

            // Redirect kembali dengan pesan error umum
            return redirect()->route('auth.login')->withErrors(['error' => 'Terjadi kesalahan, silakan coba lagi.']);
        }
    }
}
