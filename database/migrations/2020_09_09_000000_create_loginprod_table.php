<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\NamePbModule\NameIndexers;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\CustomerModule\CustomerIndexers;
use App\TimePbModule\TimeIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
use App\ImagePbModule\ImageIndexers;

class CreateLoginprodTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LOGIN_PROD', function (Blueprint $table) {
            $table->id();
            $tableCreateHandler = new \App\BaseCode\TableIndexCreateHandler();
            $tableCreateHandler->createIndexes($table,\App\LoginPbModule\LoginTableName::getcolumnIndexes());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LOGIN_PROD');
    }
}
