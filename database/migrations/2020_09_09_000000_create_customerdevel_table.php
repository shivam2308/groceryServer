<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;

class CreateCustomerdevelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CUSTOMER_DEVEL', function (Blueprint $table) {
            $table->id();
            $table->string(EntityIndexers::getDBID());
            $table->string(EntityIndexers::getLIFETIME());
            $table->string(EntityIndexers::getDEFAULT_TIMEZONE());
            $table->string(CustomerIndexers::getPRIVILEGE());

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CUSTOMER_DEVEL');
    }
}
