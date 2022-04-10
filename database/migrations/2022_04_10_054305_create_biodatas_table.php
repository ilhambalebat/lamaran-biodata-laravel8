<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("user_id");
            $table->string("nama");
            $table->string("posisi");
            $table->string("no_ktp");
            $table->string("tempat_lahir");
            $table->string("tanggal_lahir");
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string("agama");
            $table->string("golongan_darah");
            $table->string("status");
            $table->string("alamat_ktp");
            $table->string("alamat_tinggal");
            $table->string("email");
            $table->string("no_telepon");
            $table->string("orang_terdekat");
            $table->string("skill");
            $table->enum('ditempatkan', ['ya', 'tidak']);
            $table->string("penghasilan");
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
        Schema::dropIfExists('biodatas');
    }
}
