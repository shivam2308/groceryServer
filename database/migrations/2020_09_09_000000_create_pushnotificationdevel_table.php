<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePushNotificationdevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PUSH_NOTIFICATION_DEVEL', function (Blueprint $table) {
            $table->id();
            $tableCreateHandler = new \App\BaseCode\TableIndexCreateHandler();
            $tableCreateHandler->createIndexes($table,\App\PushNotificationPbModule\PushNotificationTableName::getcolumnIndexes());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PUSH_NOTIFICATION_DEVEL');
    }
}
