<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_kelas', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->string('nama_role');
            $table->unsignedBigInteger('kelas_mapel_id');
            $table->foreign('kelas_mapel_id')->references('id')->on('kelas_mapels')->onDelete('set null');
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
        Schema::dropIfExists('role_kelas');
    }
}
