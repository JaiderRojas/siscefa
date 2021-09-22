
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
             $table->foreignId('element_id')->constrained('elements')->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('cascade');
            $table->foreignId('people_id')->constrained('people')->onDelete('cascade');
            $table->text('description');
            $table->integer('quantity');
            $table->unsignedInteger('unit_price');
            $table->INTEGER('stock');
            $table->INTEGER('lot_number');
            $table->enum('stateElement',['Exelente','Bueno','Regular']);
            $table->enum('state',['Disponible','No_Disponible']);
            $table->string('mark');
            $table->unsignedInteger('inventoryCode');
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
        Schema::dropIfExists('inventories');
    }
}
