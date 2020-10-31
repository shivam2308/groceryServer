<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;
use App\ItemPbModule\ItemIndexers;
use App\BuyPbModule\BuyIndexers;
use App\NamePbModule\NameIndexers;
use App\ContactDetailPbModule\ContactDetailIndexers;

class CreateBuydevelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BUY_DEVEL', function (Blueprint $table) {
            $table->id();
            $table->string(EntityIndexers::getDBID());
            $table->string(BuyIndexers::getORDER_ID());
            $table->string(CustomerIndexers::getCUSTOMER_REF_ID());
            $table->string(NameIndexers::getFIRSTNAME())->nullable();
            $table->string(NameIndexers::getLASTNAME())->nullable();
            $table->string(NameIndexers::getCANONICAL_NAME())->nullable();
            $table->string(ContactDetailIndexers::getLOCALPART());
            $table->string(ContactDetailIndexers::getDOMAINPART());
            $table->string(ContactDetailIndexers::getMOBILENO());
            $table->string(ItemIndexers::getITEM_REF_ID());
            $table->int32(BuyIndexers::getQUANTITY());
            $table->float(BuyIndexers::getPRICE());
            $table->string(BuyIndexers::getDELIVERY_STATUS());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BUY_DEVEL');
    }
}