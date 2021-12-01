<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan',5);
            $table->string('nama_barang',100);
            $table->string('satuan_barang',100);
            $table->integer('jumlah')->default(0);
            $table->string('kode_supplier',5);
            $table->integer('cek_kirim')->default(0);
            $table->integer('cek_terima')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
