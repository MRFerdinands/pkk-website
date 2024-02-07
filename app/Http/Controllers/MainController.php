<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Termwind\Components\Element;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function rating(Request $request)
    {
        Main::create($request->all());
        return redirect()->route('home');
    }
}
