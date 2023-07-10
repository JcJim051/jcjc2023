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
            $table->string('codigomesa')->nullable();
            $table->foreign('codigomesa')->references('codigomesa_id')->on('votos')->onUpdate('cascade');;
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
            $table->integer('censodemesa')->nullable();
            $table->integer('votosenurna')->nullable();
            $table->integer('votosincinerados')->nullable();
            $table->integer('gob1')->nullable();
            $table->integer('gob2')->nullable();
            $table->integer('gob3')->nullable();
            $table->integer('gob4')->nullable();
            $table->integer('gob5')->nullable();
            $table->integer('gob6')->nullable();
            $table->integer('gob7')->nullable();
            $table->integer('nulos')->nullable();
            $table->integer('enblanco')->nullable();
            $table->integer('nomarcados')->nullable();
            $table->integer('recuperados')->nullable();
            $table->string('statusrec')->default('0')->nullable();
            $table->string('statusasistencia')->default('0')->nullable();
            $table->string('remenmesa')->default('0')->nullable();
            $table->string('e14')->nullable();
            $table->string('banco')->default(0);
            $table->string('fotorec')->nullable();
            $table->string('modificadopor')->nullable();
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
