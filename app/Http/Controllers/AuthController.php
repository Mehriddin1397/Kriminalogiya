<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Foydalanuvchini topamiz
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Bunday foydalanuvchi mavjud emas.']);
        }

        // Parolni tekshiramiz
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Noto‘g‘ri parol!']);
        }

        // Login qilish
        if (Auth::attempt($request->only('email', 'password'))) {

            return view('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Login amalga oshmadi, iltimos tekshirib qaytadan urinib ko‘ring.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
