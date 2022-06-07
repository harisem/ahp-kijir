<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tanggungan_id');
            $table->integer('masa_kerja');
            $table->bigInteger('gaji_pokok');
            $table->integer('jumlah_tanggungan');
            $table->string('nama');
            $table->string('jenjang_pendidikan');
            $table->string('institusi_pendidikan');
            $table->decimal('nilai', 8, 2, true);
            $table->string('file_nilai');
            $table->string('file_surat_permohonan');
            $table->string('file_ket_pendidikan');
            $table->decimal('nilai_akhir', 8, 2, true);
            $table->enum('status', ['disetujui', 'menunggu konfirmasi', 'tidak disetujui'])->default('menunggu konfirmasi');
            $table->timestamps();

            $table->foreign('tanggungan_id')->references('id')->on('tanggungans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
