<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\NamePbModule\NameIndexers;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\TimePbModule\TimeIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
use App\ImagePbModule\ImageIndexers;

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
            $table->string(EntityIndexers::getDBID());
            $table->string(EntityIndexers::getLIFETIME());
            $table->string(EntityIndexers::getDEFAULT_TIMEZONE());
            $table->string(NameIndexers::getFIRSTNAME())->nullable();
            $table->string(NameIndexers::getLASTNAME())->nullable();
            $table->string(NameIndexers::getCANONICAL_NAME())->nullable();
            $table->string(ContactDetailIndexers::getLOCALPART());
            $table->string(ContactDetailIndexers::getDOMAINPART());
            $table->string(ContactDetailIndexers::getMOBILENO());
            $table->string(ImageIndexers::getURL())->nullable();
            $table->string(DeliveryManIndexers::getADHAR_NO());
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
        Schema::dropIfExists('DELIVERY_MAN_PROD');
    }
}
