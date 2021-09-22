<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
             $table->enum('document_type', ['Cedula de ciudadania','Tarjeta de identidad','Cedula de extrangeria','Pasaporte','Documento nacional de identidad','Registro civil']);
            $table->unsignedInteger('document')->unique();
            $table->string('first_name');
            $table->string('first_last_name');
            $table->string('second_last_name')->nullable();
            $table->string('address');
            //$table->unsignedInteger('telephone1')->nullable();
            //$table->unsignedInteger('telephone2')->nullable();
            //$table->unsignedInteger('telephone3')->nullable();
            $table->string('misena_email')->nullable();
            $table->string('sena_email')->nullable();
            $table->string('personal_email')->nullable();
            //$table->string('avatar')->nullable();
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
        Schema::dropIfExists('people');
    }
}
