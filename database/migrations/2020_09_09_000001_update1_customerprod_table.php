<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;
use App\NamePbModule\NameIndexers;
use App\AddressPbModule\AddressIndexers;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\GenderPbModule\GenderIndexers;
use App\TimePbModule\TimeIndexers;

class Update1CustomerprodTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CUSTOMER_PROD', function (Blueprint $table) {
            $table->string(NameIndexers::getFIRSTNAME());
            $table->string(NameIndexers::getLASTNAME());
            $table->string(NameIndexers::getCANONICAL_NAME());
            $table->string(AddressIndexers::getHOMENO());
            $table->string(AddressIndexers::getSTREET());
            $table->string(AddressIndexers::getLANDMARK());
            $table->string(AddressIndexers::getCITY());
            $table->string(AddressIndexers::getSTATE());
            $table->integer(AddressIndexers::getPINCODE());
            $table->string(ContactDetailIndexers::getLOCALPART());
            $table->string(ContactDetailIndexers::getDOMAINPART()); 
            $table->string(ContactDetailIndexers::getMOBILENO());
            $table->string(GenderIndexers::getGENDER());
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
        Schema::dropIfExists('CUSTOMER_PROD');
    }
}
