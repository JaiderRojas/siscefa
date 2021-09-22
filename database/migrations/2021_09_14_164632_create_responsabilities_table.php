<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('people_id')->constrained('people')->onDelete('cascade');
            $table->foreignId('movement_id')->constrained('movements')->onDelete('cascade');
            $table->enum('rol',['vendedor', 'comprador', 'solicitante', 'entrega', 'recibe', 'autoriza', 'cuentadante', 'vigilanciaSalida', 'vigilanciaEntrada']);
            $table->datetime('date');

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
        Schema::dropIfExists('responsabilities');
    }
}
