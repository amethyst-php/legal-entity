<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateLegalEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.legal-entity.data.legal-entity.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on(Config::get('amethyst.taxonomy.data.taxonomy.table'));
            $table->string('country')->nullable();
            $table->integer('registered_office_address_id')->unsigned()->nullable();
            $table->foreign('registered_office_address_id')->references('id')->on(Config::get('amethyst.address.data.address.table'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.legal-entity.data.legal-entity.table'));
    }
}
