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
        Schema::table('riwayat_jabatans', function (Blueprint $table) {
            $table->string('nama_skpd')->after('skpd_id');
            $table->string('identitas_id')->after('nama_skpd');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_jabatans', function (Blueprint $table) {
        });
    }
};
