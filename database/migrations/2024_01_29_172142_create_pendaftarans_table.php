<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor');
            $table->string('nama_pelanggan');
            $table->string('kendaraan');
            $table->string('merk_kendaraan');
            $table->integer('biaya_tambahan')->nullable()->default(0);
            $table->integer('biaya_makanan')->nullable()->default(0);
            $table->integer('diskon')->nullable()->default(0);
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
