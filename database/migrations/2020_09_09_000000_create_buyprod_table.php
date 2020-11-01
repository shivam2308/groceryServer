<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;
use App\ItemPbModule\ItemIndexers;
use App\BuyPbModule\BuyIndexers;
use App\TimePbModule\TimeIndexers;

class CreateBuyprodTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BUY_PROD', function (Blueprint $table) {
            $table->id();
            $table->string(EntityIndexers::getDBID());
            $table->string(EntityIndexers::getLIFETIME());
            $table->string(EntityIndexers::getDEFAULT_TIMEZONE());
            $table->string(BuyIndexers::getORDER_ID());
            $table->string(CustomerIndexers::getCUSTOMER_REF());
            $table->string(ItemIndexers::getITEM_REF());
            $table->integer(BuyIndexers::getQUANTITY());
            $table->float(BuyIndexers::getPRICE());
            $table->string(BuyIndexers::getDELIVERY_STATUS());
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
        Schema::dropIfExists('BUY_PROD');
    }
}