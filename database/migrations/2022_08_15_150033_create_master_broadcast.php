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
        Schema::create('master_broadcast', function (Blueprint $table) {
            $table->id('id_broadcast');
            $table->string('nama_broadcast');
            $table->timestamp('tgl_broadcast');
            $table->string('keterangan_broadcast');
            $table->string('tujuan');
            $table->string('angkatan');
            $table->string('id_user_ditugaskan');
            $table->boolean('flag_id_broadcast');
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
        Schema::dropIfExists('master_broadcast');
    }
};
