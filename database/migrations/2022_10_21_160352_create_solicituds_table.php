<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->string('nombre', 50);
            $table->string('descripcion', 250);
            $table->string('estado', 50)->default('En progreso');
            $table->integer('calificacion')->default(0);
            $table->string('comentarios', 250)->nullable()->default('(Sin comentarios)');
            $table->date('fechaAsignacion')->default(DB::raw('NOW()'));
            $table->date('fechaFinalización')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
};
