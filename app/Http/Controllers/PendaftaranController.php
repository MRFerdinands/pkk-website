<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PendaftaranController extends Controller
{
    public function selectservicemobil()
    {
        $data = Service::where('tipekendaraan', 'Mobil')->where('nama', 'like', '%' . request('q') . '%')->paginate(99);
        return response()->json($data);
    }

    public function selectplatnomormobil()
    {
        $datas = Customer::where('kendaraan', 'Mobil')->where('plat_nomor', 'like', '%' . request('q') . '%')->paginate(99);
        return response()->json($datas);
    }

    public function selectservicemotor()
    {
        $data = Service::where('tipekendaraan', 'Motor')->where('nama', 'like', '%' . request('q') . '%')->paginate(99);
        return response()->json($data);
    }

    public function selectplatnomormotor()
    {
        $datas = Customer::where('kendaraan', 'Motor')->where('plat_nomor', 'like', '%' . request('q') . '%')->paginate(99);
        return response()->json($datas);
    }

    public function prosesdaftarmotor(Request $request)
    {
        try {
            $this->validate($request, [
                'plat_nomor_motor' => 'required',
                'id_service_motor' => 'required',
            ], [
                'plat_nomor_motor' => 'Plat Nomor tidak boleh kosong!',
                'id_service_motor' => 'Service tidak boleh kosong!',
            ]);

            // Validation passed, continue with your code
            $existingCustomer = Customer::where('plat_nomor', $request->plat_nomor_motor)->first();
            if (!$existingCustomer) {
                Customer::create([
                    'plat_nomor' => Str::upper($request->plat_nomor_motor),
                    'nama_pelanggan' => $request->nama_pelanggan == '' ? '-' : $request->nama_pelanggan,
                    'kendaraan' => 'Motor',
                    'merk_kendaraan' => $request->merk_kendaraan == '' ? '-' : $request->merk_kendaraan,
                ]);
            }

            $pendaftaran = Pendaftaran::create([
                'plat_nomor' => Str::upper($request->plat_nomor_motor),
                'nama_pelanggan' => $request->nama_pelanggan == '' ? '-' : $request->nama_pelanggan,
                'kendaraan' => 'Motor',
                'merk_kendaraan' => $request->merk_kendaraan == '' ? '-' : $request->merk_kendaraan,
                'biaya_tambahan' => $request->biaya_tambahan,
                'biaya_makanan' => $request->biaya_makanan,
                'diskon' => $request->diskon,
                'id_service' => $request->id_service_motor,
                'total' => 0,
            ]);
            $pendaftaran->calculateTotal();
            toastr()->success('Data berhasil ditambahkan!');
            return redirect('transaksi');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }

    public function prosesdaftarmobil(Request $request)
    {
        try {
            $this->validate($request, [
                'plat_nomor' => 'required',
                'id_service' => 'required',
            ], [
                'plat_nomor' => 'Plat Nomor tidak boleh kosong!',
                'id_service' => 'Service tidak boleh kosong!',
            ]);

            $existingCustomer = Customer::where('plat_nomor', $request->plat_nomor)->first();
            if (!$existingCustomer) {
                Customer::create([
                    'plat_nomor' => Str::upper($request->plat_nomor),
                    'nama_pelanggan' => $request->nama_pelanggan == '' ? '-' : $request->nama_pelanggan,
                    'kendaraan' => 'Mobil',
                    'merk_kendaraan' => $request->merk_kendaraan == '' ? '-' : $request->merk_kendaraan,
                ]);
            }
            $pendaftaran = Pendaftaran::create([
                'plat_nomor' => Str::upper($request->plat_nomor),
                'nama_pelanggan' => $request->nama_pelanggan == '' ? '-' : $request->nama_pelanggan,
                'kendaraan' => 'Mobil',
                'merk_kendaraan' => $request->merk_kendaraan == '' ? '-' : $request->merk_kendaraan,
                'biaya_tambahan' => $request->biaya_tambahan,
                'biaya_makanan' => $request->biaya_makanan,
                'diskon' => $request->diskon,
                'id_service' => $request->id_service,
                'total' => 0,
            ]);
            $pendaftaran->calculateTotal();
            toastr()->success('Data berhasil di tambah!');
            return redirect('transaksi');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }
}
