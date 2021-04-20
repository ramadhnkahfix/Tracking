<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id_user', true);
            $table->string('nama', 50);
            $table->string('email', 100)->unique('email_UNIQUE');
            $table->string('email_verified_at', 45)->nullable();
            $table->string('password', 300);
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->rememberToken();
            $table->integer('id_jabatan')->index('fk_user_jabatan_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
