<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Main;
use App\Models\User;
use App\Models\Service;
use App\Models\Customer;
use App\Charts\TessChart;
use App\Models\Kendaraan;
use App\Models\Pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function dashboard()
    {
        Carbon::setLocale('id');
        $today = Carbon::today();
        $tahunIni = $today->year;
        $totalPendapatanHariini = DB::table('pendaftarans')
            ->whereDate('created_at', $today)
            ->sum('total');
        $totalPendaftaranHariIni = Pendaftaran::whereDate('created_at', $today)->count();
        $namaHari = $today->isoFormat('dddd');
        $namaBulan = $today->isoFormat('MMMM');
        $totalPendapatanBulanIni = Pendaftaran::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->sum('total');
        $totalPendapatanTahunIni = Pendaftaran::whereYear('created_at', $tahunIni)
            ->sum('total');
        $totalPendaftaranBulanIni = Pendaftaran::whereYear('created_at', $today->year)
            ->whereMonth('created_at', $today->month)
            ->count();
        $totalPendaftaranTahunIni = Pendaftaran::whereYear('created_at', $tahunIni)
            ->count();

        // Total Pendaftaran Per Bulan Dalam 1 Tahun
        $registrationsData = Pendaftaran::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_registrations')
        )
            ->groupBy('year', 'month')
            ->get();
        $chartData = [
            'title' => [
                'text' => 'Pendaftaran Setiap Tahun',
                'align' => 'center',
            ],
            'chart' => [
                'toolbar' => [
                    'show' => false,
                ],
                'height' => '340',
                'type' => 'area'
            ],
            'stroke' => [
                'curve' => 'smooth'
            ],
            'series' => [],
            'xaxis' => [
                'categories' => [],
            ],
            'yaxis' => [
                'title' => [
                    'text' => 'Pendaftaran'
                ],
            ]
        ];

        // Organize data for each year
        foreach ($registrationsData->groupBy('year') as $year => $yearData) {
            $chartData['series'][] = [
                'name' => $year,
                'data' => $yearData->pluck('total_registrations')->toArray(),
            ];

            // Create categories for each month
            $chartData['xaxis']['categories'] = $yearData->pluck('month')->map(function ($month) {
                return date('F', mktime(0, 0, 0, $month, 1));
            })->toArray();
        }
        return view('dashboard', compact('chartData', 'totalPendapatanHariini', 'namaHari', 'namaBulan', 'totalPendaftaranHariIni', 'totalPendapatanBulanIni', 'totalPendaftaranBulanIni', 'totalPendaftaranTahunIni', 'tahunIni', 'totalPendapatanTahunIni'));
    }

    public function pendaftaran()
    {
        $dataservice = Service::all();
        return view('pendaftaran', compact('dataservice'));
    }

    public function transaksi(Request $request)
    {
        if ($request->has('search')) {
            $data = Pendaftaran::where('plat_nomor', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $data = Pendaftaran::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('transaksi', compact('data'));
    }

    public function customer()
    {
        $data = Customer::all();
        return view('customer', compact('data'));
    }

    public function deletecustomer($id)
    {
        try {
            $data = Customer::find($id);
            $data->delete();
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('customer');
        }
        toastr()->success('Data berhasil di hapus!');
        return redirect('customer');
    }


    public function laporan()
    {
        $data = Pendaftaran::all();
        return view('laporan', compact('data'));
    }

    // User
    public function user()
    {
        $data = User::all();
        return view('user', compact('data'));
    }

    public function edituser($id)
    {
        $data = User::find($id);
        return view('actions.edituser', compact('data'));
    }

    public function tambahuser(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ]);
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('user');
        }
        toastr()->success('Data berhasil di tambah!');
        return redirect('user');
    }

    public function deleteuser($id)
    {
        try {
            $data = User::find($id);
            $data->delete();
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('user');
        }
        toastr()->success('Data berhasil di hapus!');
        return redirect('user');
    }

    public function updateuser(Request $request, $id)
    {
        try {
            User::where('id', $id)->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ]);
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('user');
        }
        toastr()->success('Data berhasil di update!');
        return redirect('user');
    }
    // End User

    // Jenis Service
    public function tipeservice()
    {
        $data = Service::all();
        return view('tipeservice', compact('data'));
    }

    public function tambahservice(Request $request)
    {
        try {
            Service::create($request->all());
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('tipeservice');
        }
        toastr()->success('Data berhasil di tambah!');
        return redirect()->route('tipeservice');
    }

    public function editservice($id)
    {
        $data = Service::find($id);
        return view('actions.editservice', compact('data'));
    }

    public function deleteservice($id)
    {
        $data = Service::find($id);
        try {
            $data->delete();
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('tipeservice');
        }
        toastr()->success('Data berhasil di hapus!');
        return redirect('tipeservice');
    }

    public function updateservice(Request $request, $id)
    {
        $data = Service::find($id);
        try {
            $data->update($request->all());
        } catch (QueryException $e) {
            toastr()->error('Database error: ' . $e->getMessage());
            return redirect('tipeservice');
        }
        toastr()->success('Data berhasil di update!');
        return redirect()->route('tipeservice');
    }
    // End Jenis Service

    public function kritiksaran()
    {
        $data = Main::orderBy('created_at', 'desc')->get();
        // $data = Main::all();
        return view('kritiksaran', compact('data'));
    }
    public function deleterating($id)
    {
        $data = Main::find($id);
        $data->delete();
        return redirect()->route('kritiksaran');
    }
}
