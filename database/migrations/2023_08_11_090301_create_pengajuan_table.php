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
            $table->integer('reviewer_id');
            $table->integer('iku_id');
            $table->string('kode_mak', 100);
            $table->string('pjk', 100);
            $table->string('nama_pengajuan', 255);
            $table->string('lokasi', 255)->nullable();
            $table->integer('pagu');
            $table->string('output', 255)->nullable();
            $table->integer('status_pengajuan');
            $table->string('file_tor', 255);
            $table->string('file_rab', 255);
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
