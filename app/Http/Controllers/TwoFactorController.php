<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TwoFactorController extends Controller
{
    public function showForm()
    {
        // Agar foydalanuvchi sessiyada bo‘lmasa - login page ga qaytaramiz
        if (!session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }

        // 2FA kodni kiritish sahifasini ko‘rsatamiz
        return view('auth.verify-code');
    }

    public function verify(Request $request)
    {
        // Kod kiritilganmi, tekshiramiz
        $request->validate([
            'code' => 'required'
        ]);

        // .env dan kodni olamiz
        $correctCode = env('TWO_FACTOR_CODE', '123456');

        // Kod noto‘g‘ri bo‘lsa - login page ga qaytamiz
        if ($request->code !== $correctCode) {
            return redirect()->route('login')->withErrors(['code' => 'Kod noto‘g‘ri']);
        }

        // Kod to‘g‘ri bo‘lsa - userni login qilamiz
        $userId = session('2fa:user:id');
        $user = User::find($userId);

        auth()->login($user);
        session()->forget('2fa:user:id');

        return redirect()->intended('/dashboard');
    }
}

