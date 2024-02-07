<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TransaksiController extends Controller
{
    // public function edittransaksimobil($id)
    // {
    //     $data = Pendaftaran::find($id);
    //     return view('actions.edittransaksimobil', compact('data'));
    // }
    // public function updatetransaksimobil(Request $request, $id)
    // {
    //     $data = Pendaftaran::find($id);
    //     dd($request->all());
    //     // $data->update($request->all());
    //     return redirect('transaksi');
    // }
    public function deletetransaksimobil(Request $request, $id)
    {
        $data = Pendaftaran::find($id);
        $data->delete();
        return redirect('transaksi');
    }
}
