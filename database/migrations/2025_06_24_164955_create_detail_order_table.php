<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->id('id_detail_order');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->string('nm_produk', 50);
            $table->integer('harga');
            $table->integer('jml_order');
            $table->integer('berat')->default(0);
            $table->integer('subberat')->default(0);
            $table->integer('subharga');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tbl_detail_order');
    }
};
