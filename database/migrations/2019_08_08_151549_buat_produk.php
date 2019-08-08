<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_produk', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->string('kode', 5);
          $table->string('nama', 100);
          $table->string('kategori',50);
          $table->string('satuan',20);
          $table->text('deksripsi');
          $table->integer('harga_beli');
          $table->integer('harga_jual');
          $table->integer('stok');
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
