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
use App\ImagePbModule\ImageIndexers;

class Update2CustomerprodTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CUSTOMER_PROD', function (Blueprint $table) {
            $table->string(ImageIndexers::getURL())->nullable();
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
