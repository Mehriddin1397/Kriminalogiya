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

        // Login to‘g‘ri bo‘lsa, foydalanuvchini avtomatik login qilmaymiz
        // Avval 2FA bosqichini tekshiramiz
        session(['2fa_user_id' => $user->id]);
        return redirect()->route('verify.code.form');
    }

    public function showVerifyForm()
    {
        if (!session()->has('2fa_user_id')) {
            return redirect()->route('login')->withErrors(['email' => 'Avval login qiling.']);
        }

        return view('auth.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $correctCode = env('TWO_FACTOR_CODE', 'kino_admin'); // .env dan kodni olamiz

        if ($request->code !== $correctCode) {
            return redirect()->route('login')->withErrors(['code' => 'Kiritilgan kod noto‘g‘ri.']);
        }

        $user = User::find(session('2fa_user_id'));

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'Foydalanuvchi topilmadi.']);
        }

        Auth::login($user);
        session()->forget('2fa_user_id');

        return redirect()->route('admin.dashboard'); // yoki istalgan sahifaga
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
