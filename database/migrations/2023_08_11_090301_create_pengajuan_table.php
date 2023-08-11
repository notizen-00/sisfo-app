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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('iku_id');
            $table->string('pjk',100);
            $table->string('nama_pengajuan',255);
            $table->string('lokasi',255)->nullable();
            $table->integer('pagu',50);
            $table->string('output',255)->nullable();
            $table->integer('status_pengajuan');
            $table->date('tanggal_pelaksanaan');
            $table->date('tanggal_selesai');
            $table->time('jam_pelaksanaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
