<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->integer('id_dokumen', true);
            $table->string('nama_instansi');
            $table->string('email', 100);
            $table->date('tanggal');
            $table->tinyInteger('status');
            $table->tinyInteger('kategori');
            $table->tinyInteger('approve');
            $table->string('alasan')->nullable();
            $table->string('kode');
            $table->tinyInteger('user_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
