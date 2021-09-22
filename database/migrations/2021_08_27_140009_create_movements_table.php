<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('registration_date');
            $table->date('return_date');
            $table->unsignedInteger('voucher_number')->nullable();
            $table->string('dependence');
            $table->string('translation');
            $table->text('objective');
           // $table->integer('total');
            //$table->text('observation');
            $table->enum('state',['solicitud','aprovacion','anulada','devuelto']);
            $table->enum('type_movement',['MovInterno','ventas','bajas','PresInterno','PresExterno']);
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
        Schema::dropIfExists('movements');
    }
}
