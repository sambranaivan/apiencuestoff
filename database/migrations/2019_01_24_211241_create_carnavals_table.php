<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarnavalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnavals', function (Blueprint $table) {
            $table->increments('id');
                $table->string('procedencia');
    $table->string('sexo');
    $table->integer("edad");
    $table->string("viaje");//solo pareja familia
    $table->string("cantidad_personas");//viaje_cantidad
    $table->string('informo');//como se informo
    // $table->string(otros_informoinformo)
    $table->string('motivo');//motivo
    // $table->string(otro_motivo)
    $table->string('transporte');//medio de transporte
    // $table->string(otro_transporteviaje)
    $table->string('lugar_alojamiento');//donde se aloja?
    $table->string('tipoalojamiento');//tipo de alojamineto
    $table->string('primeravez');//primer vez que asiste?
    $table->string('recomendaria');//recomendarioa
    $table->string('gastos');//gastos
    $table->string('userid');//intalation id
    $table->string('timestamp');//timestamp de la carga
    $table->string('hash');///id + timestamp para id unico
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
        Schema::dropIfExists('carnavals');
    }
}
