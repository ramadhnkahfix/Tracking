<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenSelesaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_selesai', function (Blueprint $table) {
            $table->integer('id_dokumen_selesai', true);
            $table->string('file', 225);
            $table->date('tanggal');
            $table->string('author', 50);
            $table->integer('dokumen_id_dokumen')->index('fk_dokumen_selesai_dokumen1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_selesai');
    }
}
