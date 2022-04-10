<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pekerjaans', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("biodata_id");
            $table->string("nama_perusahaan");
            $table->string("posisi_terakhir");
            $table->string("pendapatan_terakhir");
            $table->year("tahun");
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
        Schema::dropIfExists('riwayat_pekerjaans');
    }
}
