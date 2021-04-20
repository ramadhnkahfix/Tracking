<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_dokumen', function (Blueprint $table) {
            $table->integer('id_detail_dokumen', true);
            $table->string('file');
            $table->integer('dokumen_id_dokumen')->index('fk_detail_dokumen_dokumen1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_dokumen');
    }
}
