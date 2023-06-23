<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {
            $table->string('codigomesa_id')->primary();
            
            $table->integer('censodemesa_zonal')->nullable();
            $table->integer('votosenurna_zonal')->nullable();
            $table->integer('votosincinerados_zonal')->nullable();
            $table->integer('gob1_zonal')->nullable();
            $table->integer('gob2_zonal')->nullable();
            $table->integer('gob3_zonal')->nullable();
            $table->integer('gob4_zonal')->nullable();
            $table->integer('gob5_zonal')->nullable();
            $table->integer('gob6_zonal')->nullable();
            $table->integer('gob7_zonal')->nullable();
            $table->integer('nulos_zonal')->nullable();
            $table->integer('enblanco_zonal')->nullable();
            $table->integer('nomarcados_zonal')->nullable();
            $table->integer('recuperados_zonal')->nullable();

            $table->integer('censodemesa_municipal')->nullable();
            $table->integer('votosenurna_municipal')->nullable();
            $table->integer('votosincinerados_municipal')->nullable();
            $table->integer('gob1_municipal')->nullable();
            $table->integer('gob2_municipal')->nullable();
            $table->integer('gob3_municipal')->nullable();
            $table->integer('gob4_municipal')->nullable();
            $table->integer('gob5_municipal')->nullable();
            $table->integer('gob6_municipal')->nullable();
            $table->integer('gob7_municipal')->nullable();
            $table->integer('nulos_municipal')->nullable();
            $table->integer('enblanco_municipal')->nullable();
            $table->integer('nomarcados_municipal')->nullable();
            $table->integer('recuperados_municipal')->nullable();

            $table->integer('censodemesa_departamental')->nullable();
            $table->integer('votosenurna_departamental')->nullable();
            $table->integer('votosincinerados_departamental')->nullable();
            $table->integer('gob1_departamental')->nullable();
            $table->integer('gob2_departamental')->nullable();
            $table->integer('gob3_departamental')->nullable();
            $table->integer('gob4_departamental')->nullable();
            $table->integer('gob5_departamental')->nullable();
            $table->integer('gob6_departamental')->nullable();
            $table->integer('gob7_departamental')->nullable();
            $table->integer('nulos_departamental')->nullable();
            $table->integer('enblanco_departamental')->nullable();
            $table->integer('nomarcados_departamental')->nullable();
            $table->integer('recuperados_departamental')->nullable();

            $table->string('modificadopor_votos')->nullable();
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
        Schema::dropIfExists('votos');
    }
}
