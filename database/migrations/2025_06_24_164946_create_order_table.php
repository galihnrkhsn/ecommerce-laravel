<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->foreignId('id_pelanggan')->constrained('users', 'id')->onDelete('cascade');
            $table->string('nm_penerima', 30);
            $table->string('telp', 13);
            $table->string('provinsi', 30);
            $table->string('kota', 30);
            $table->integer('kode_pos');
            $table->string('alamat_pengiriman', 100);
            $table->date('tgl_order');
            $table->integer('ongkir')->default(0);
            $table->integer('total_order');
            $table->string('status')->default('Belum Dibayar');
            $table->string('no_resi')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
