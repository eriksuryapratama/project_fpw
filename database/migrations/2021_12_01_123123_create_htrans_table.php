<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htrans', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota',5);
            $table->string('nama_barang',100);
            $table->string('satuan_barang',100);
            $table->integer('harga_barang')->default(0);
            $table->integer('jumlah')->default(0);
            $table->integer('total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htrans');
    }
}
