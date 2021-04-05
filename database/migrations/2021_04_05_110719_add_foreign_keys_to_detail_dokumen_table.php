<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_dokumen', function (Blueprint $table) {
            $table->foreign('dokumen_id_dokumen', 'fk_detail_dokumen_dokumen1')->references('id_dokumen')->on('dokumen')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_dokumen', function (Blueprint $table) {
            $table->dropForeign('fk_detail_dokumen_dokumen1');
        });
    }
}
