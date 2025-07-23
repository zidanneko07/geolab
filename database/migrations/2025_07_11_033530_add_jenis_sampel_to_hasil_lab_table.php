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
        Schema::table('hasil_lab', function (Blueprint $table) {
            $table->string('jenis_sampel', 50)->after('judul_lab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil_lab', function (Blueprint $table) {
            $table->dropColumn('jenis_sampel');
        });
    }
};
