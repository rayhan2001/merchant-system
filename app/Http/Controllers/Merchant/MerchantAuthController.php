<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.merchant.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'merchant'])) {
            return response()->json(['message' => 'Login successful'], 200);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function showRegister()
    {
        return view('auth.merchant.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'shop_name' => 'required',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'merchant',
        ]);

        $tenant = Tenant::create([
            'id' => $request->shop_name,
            'shop_name' => $request->shop_name,
            'email' => $request->email,
        ]);

        $tenant->domains()->create(['domain' => $request->shop_name . '.localhost']);

        return response()->json(['message' => 'Merchant registered successfully'], 200);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/merchant/login');
    }
}
