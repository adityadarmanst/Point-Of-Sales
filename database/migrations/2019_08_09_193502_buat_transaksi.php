<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_transaksi', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('id_transaksi', 50);
          $table->string('no_faktur', 50);
          $table->string('jenis_transaksi', 20);
          $table->string('kode_produk', 50);
          $table->string('jumlah_barang', 7);
          $table->string('total_biaya', 50);
          $table->string('active', 1);
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
        //
    }
}
