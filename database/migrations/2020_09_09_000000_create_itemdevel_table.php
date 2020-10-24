<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\NamePbModule\NameIndexers;
use App\ItemPbModule\ItemIndexers;
use App\ImagePbModule\ImageIndexers;
use App\TimePbModule\TimeIndexers;

class CreateItemdevelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ITEM_DEVEL', function (Blueprint $table) {
            $table->id();
            $table->string(EntityIndexers::getDBID());
            $table->string(EntityIndexers::getLIFETIME());
            $table->string(EntityIndexers::getDEFAULT_TIMEZONE());
            $table->string(NameIndexers::getFIRSTNAME())->nullable();
            $table->string(NameIndexers::getLASTNAME())->nullable();
            $table->string(NameIndexers::getCANONICAL_NAME())->nullable();
            $table->string(ImageIndexers::getURL())->nullable();
            $table->string(ItemIndexers::getQUANTITY());
            $table->string(ItemIndexers::getPRICE());
            $table->string(ItemIndexers::getITEMTYPE());
            $table->string(ItemIndexers::getAVAILABILITYSTATUS());
            $table->string(ItemIndexers::getITEM_QYANTITY_TYPE());
            $table->string(TimeIndexers::getDATE());
            $table->string(TimeIndexers::getMONTH());
            $table->string(TimeIndexers::getYEAR());
            $table->bigInteger(TimeIndexers::getMILLISECONDS());
            $table->string(TimeIndexers::getFORMATTED_DATE());
            $table->string(TimeIndexers::getTIMEZONE());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ITEM_DEVEL');
    }
}
