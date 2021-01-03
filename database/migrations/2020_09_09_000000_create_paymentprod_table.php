<?php

use App\PaymentPbModule\PaymentTableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePaymentprodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PAYMENT_PROD', function (Blueprint $table) {
            $table->id();
            $tableCreateHandler = new \App\BaseCode\TableIndexCreateHandler();
            $tableCreateHandler->createIndexes($table,PaymentTableName::getcolumnIndexes());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PAYMENT_PROD');
    }
}
