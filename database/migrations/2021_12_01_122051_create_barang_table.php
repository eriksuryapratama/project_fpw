<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang',5);
            $table->string('nama_barang',100);
            $table->string('kode_kategori',100);
            $table->string('satuan_barang',100);
            $table->integer('stok_barang')->default(0);
            $table->integer('harga_barang')->default(0);
            $table->string('gambar', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
