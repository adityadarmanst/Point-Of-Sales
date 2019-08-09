<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatBiaya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_biaya', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->string('kode', 10);
          $table->string('nama', 100);
          $table->string('durasi_tagihan',20);
          $table->text('deksripsi');
          $table->integer('total');
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
