<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\IndexerHelpers\EntityIndexerProvider;

class UpdateEntityTable extends Migration
{
    private $m_EntityIndexerProvider;

    function __construct(){
        $m_EntityIndexerProvider = new EntityIndexerProvider();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ENTITY', function (Blueprint $table) {
                $table->string($this->m_EntityIndexerProvider->getDATA()->value);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ENTITY');
    }
}
