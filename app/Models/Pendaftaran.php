<?php

namespace App\Models;

use NumberFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function services()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id');
    }
    public function calculateTotal()
    {
        $servicePrice = DB::table('services')
            ->where('id', $this->id_service)
            ->value('harga');

        $total = $servicePrice + $this->biaya_tambahan + $this->biaya_makanan;
        $diskon = ($total * $this->diskon) / 100;

        $this->total = $total - $diskon;
        $this->save();
    }
}
