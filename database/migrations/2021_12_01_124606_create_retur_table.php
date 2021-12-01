<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->id();
            $table->string('kode_retur',5);
            $table->string('nama_barang',100);
            $table->string('satuan_barang',100);
            $table->integer('jumlah')->default(0);
            $table->string('kode_supplier',5);
            $table->string('kode_pegawai',5);
            $table->string('alasan',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur');
    }
}
