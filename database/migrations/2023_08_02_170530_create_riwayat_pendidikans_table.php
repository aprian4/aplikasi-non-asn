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
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {

            $table->id();
            $table->integer('identitas_id');
            $table->string('no_ijazah');
            $table->string('tgl_ijazah');
            $table->integer('pendidikan_id');
            $table->integer('tahun_lulus');
            $table->string('lembaga_pendidikan');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50)->nullable();
            $table->integer('is_active');
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
        Schema::dropIfExists('riwayat_pendidikans');
    }
};
