<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverymanprodTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DELIVERY_MAN_PROD', function (Blueprint $table) {
            $table->id();
            $tableCreateHandler = new \App\BaseCode\TableIndexCreateHandler();
            $tableCreateHandler->createIndexes($table,\App\DeliveryManPbModule\DeliveryManTableName::getcolumnIndexes());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DELIVERY_MAN_PROD');
    }
}
