<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarCicilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_cicilan', function (Blueprint $table) {
            $table->string('kode_cicilan', 20);
            $table->string('kode_kredit', 20);
            $table->date('tgl_cicilan');
            $table->integer('cicilan_ke');
            $table->float('cicilan_sisa_ke');
            $table->float('cicilan_sisa_harga');
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
        Schema::dropIfExists('bayar_cicilans');
    }
}
