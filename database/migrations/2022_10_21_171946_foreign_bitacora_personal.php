<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *                      Usuario asociado con la bitacora recien creada
     * @return void
     */
    public function up()
    {
        Schema::table('bitacoras', function (Blueprint $table) {
            $table->unsignedBigInteger('id_personal')->nullable();
            $table->foreign('id_personal')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bitacoras', function (Blueprint $table) {
            $table->dropForeign(['id_personal']);
            $table->dropColumn('id_personal');
        });
    }
};
