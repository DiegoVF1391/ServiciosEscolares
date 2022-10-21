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
        Schema::table('bitacoras', function (Blueprint $table) {
            $table->unsignedBigInteger('id_departamento')->nullable();
            $table->foreign('id_departamento')->references('id_departamento')->on('departamentos');
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
            $table->dropForeign(['id_departamento']);
            $table->dropColumn('id_departamento');
        });
    }
};
