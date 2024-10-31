<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
    
        // Periksa apakah pengguna yang sedang masuk adalah pemilik akun
        if ($request->user()->id !== Auth::id()) {
            return abort(403); // Akses ditolak jika bukan pemilik akun
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect('/profile')->withErrors(['current_password' => 'Kata sandi saat ini tidak valid.']);
        }
    
        // Update username
        $request->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->new_password),
        ]);
    
        return redirect('/')->with('success', 'Profil berhasil diperbarui');
    }
}
