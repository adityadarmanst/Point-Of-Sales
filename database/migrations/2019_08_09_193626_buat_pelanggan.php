<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_pelanggan', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('kode', 20);
          $table->string('nama_lengkap', 150);
          $table->text('alamat');
          $table->string('no_hp', 20);
          $table->string('email', 50);
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
