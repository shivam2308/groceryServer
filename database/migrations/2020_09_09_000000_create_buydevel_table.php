<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;
use App\ItemPbModule\ItemIndexers;
use App\BuyPbModule\BuyIndexers;

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
            //$table->string(CustomerIndexers::getCUSTOMER_REF_ID());
            //$table->string(ItemIndexers::getITEM_REF_ID());
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