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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->string('estado', 50)->default('En progreso');
            $table->string('calificacion', 50)->default('No calificada');
            $table->string('comentarios', 50)->nullable()->default('(Sin comentarios)');
            $table->date('fechaAsignacion')->default(DB::raw('NOW()'));
            $table->date('fechaFinalización')->nullable();
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
