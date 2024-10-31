<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anggota_id');
            $table->bigInteger('jumlah_pinjaman');
            $table->enum('jangka_waktu', ['1 Tahun', '3 Bulan', '5 Bulan']);
            $table->date('tanggal_pinjaman');
            $table->bigInteger('bayar')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjamen');
    }
}
