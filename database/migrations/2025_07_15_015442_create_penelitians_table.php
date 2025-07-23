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
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->string('judul_penelitian');
            $table->string('nama_peneliti');
            $table->string('instansi')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('kode_sampel')->nullable();
            $table->string('jenis_sampel')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('parameter_uji')->nullable();
            $table->string('metode_uji')->nullable();
            $table->string('satuan_hasil')->nullable();
            $table->date('tanggal_uji_mulai')->nullable();
            $table->date('tanggal_uji_selesai')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('petugas')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
