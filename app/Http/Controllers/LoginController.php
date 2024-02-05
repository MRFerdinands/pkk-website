<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guest()) {
            return view('login');
        }
        return redirect('dashboard');
    }

    public function register()
    {
        return view('register');
    }

    public function registerproses(Request $request)
    {
        User::create([
            'name' => $request->name,
            'role' => 'User',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            // Config::set('database.connections.mysql.database', $request->database);
            // DB::purge('mysql');
            // DB::reconnect('mysql');
            // // dd(DB::connection()->getDatabaseName());
            return redirect('/dashboard');
        }
        toastr()->error('Username atau Password Salah!');
        return redirect('/login');
    }
}
