<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHistroyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->string('nip',11);
            $table->string('no_invoice',11);
            $table->string('bukti_trf',64);
            $table->string('email',64);
            $table->string('nama',64);
            $table->string('no_wa',13);
            $table->text('alamat');
            $table->integer('jumlah_order');
            $table->integer('biaya_ongkir');
            $table->integer('harga_kalender');
            $table->string('nama_kurir',16);
            $table->integer('donasi_hsi');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
