<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('no_spk', 100);
            $table->string('tgl_spk', 50);
            $table->string('tgl_mulai', 50);
            $table->string('tgl_akhir', 50);
            $table->integer('skpd_id');
            $table->string('unit_kerja')->nullable();
            $table->integer('jabatan_id');
            $table->integer('pendidikan_id');
            $table->string('pembayaran');
            $table->string('tandatangan');
            $table->string('created_by', 50);
            $table->string('updated_by', 50)->nullable();
            $table->integer('is_active');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('riwayat_jabatans');
    }
};
