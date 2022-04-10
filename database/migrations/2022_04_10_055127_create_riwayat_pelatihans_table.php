<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pelatihans', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("biodata_id");
            $table->string("nama_seminar");
            $table->enum('sertifikat', ['ya', 'tidak']);
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
        Schema::dropIfExists('riwayat_pelatihans');
    }
}
