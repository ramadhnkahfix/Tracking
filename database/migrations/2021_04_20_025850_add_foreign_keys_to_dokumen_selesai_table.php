<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDokumenSelesaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_selesai', function (Blueprint $table) {
            $table->foreign('dokumen_id_dokumen', 'fk_dokumen_selesai_dokumen1')->references('id_dokumen')->on('dokumen')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_selesai', function (Blueprint $table) {
            $table->dropForeign('fk_dokumen_selesai_dokumen1');
        });
    }
}
