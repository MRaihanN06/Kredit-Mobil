<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_cash', function (Blueprint $table) {
            $table->char('kode_cash',10);
            $table->char('ktp_pembeli', 16);
            $table->string('kode_mobil', 20);
            $table->date('cash_tgl');
            $table->float('cash_bayar');
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
        Schema::dropIfExists('beli_cashes');
    }
}
