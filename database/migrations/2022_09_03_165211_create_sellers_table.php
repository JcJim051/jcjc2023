<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('coddep')->nullable();
            $table->string('codmun')->nullable();
            $table->text('codzon')->nullable();
            $table->text('codpuesto')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('puesto')->nullable();
            $table->string('mesa')->nullable();
            $table->string('codpar')->nullable();
            $table->string('cedula')->nullable();
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('dondevota')->nullable();
            $table->foreign('dondevota')->references('codpuesto')->on('puestos')->onUpdate('cascade');
            $table->string('codescru')->nullable();
            $table->string('codcor')->nullable();
            $table->string('status')->default('0')->nullable();
            $table->string('statusani')->default('0')->nullable();
            $table->string('reclamacion')->nullable();
            $table->string('observacion')->nullable();
            $table->string('pdf')->nullable();
            $table->string('gob1')->nullable();
            $table->string('gob2')->nullable();
            $table->string('gob3')->nullable();
            $table->string('asa1')->nullable();
            $table->string('asa2')->nullable();
            $table->string('asa3')->nullable();
            $table->string('alc1')->nullable();
            $table->string('alc2')->nullable();
            $table->string('alc3')->nullable();
            $table->string('recuperados')->nullable();
            $table->string('e14')->nullable();
            $table->string('fotorec')->nullable();




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
        Schema::dropIfExists('sellers');
    }
}
