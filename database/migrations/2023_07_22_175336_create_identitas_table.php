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
        Schema::create('identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('gelar_depan', 20)->nullable();
            $table->string('gelar_belakang', 20)->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('pendidikan_id')->nullable();
            $table->unsignedBigInteger('skpd_id');
            $table->string('unit_kerja')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->unsignedBigInteger('perkawinan_id')->nullable();
            $table->unsignedBigInteger('pendataan_2022')->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50)->nullable();
            $table->integer('is_active');
            $table->integer('status')->nullable();
            $table->integer('status_pegawai')->nullable();
            $table->integer('status_kelengkapan')->nullable();
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
        Schema::dropIfExists('identitas');
    }
};
