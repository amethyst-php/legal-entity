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
        Schema::create(Config::get('amethyst.legal-entity.managers.legal-entity.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->integer('registered_office_address_id')->unsigned()->nullable();
            $table->foreign('registered_office_address_id')->references('id')->on(Config::get('amethyst.address.managers.address.table'));

            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create(Config::get('amethyst.legal-entity.managers.legal-entity-contact.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->text('notes')->nullable();
            $table->integer('taxonomy_id')->unsigned();
            $table->foreign('taxonomy_id')->references('id')->on(Config::get('amethyst.taxonomy.managers.taxonomy.table'));
            $table->integer('legal_entity_id')->unsigned();
            $table->foreign('legal_entity_id')->references('id')->on(Config::get('amethyst.legal-entity.managers.legal-entity.table'));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.legal-entity.managers.legal-entity.table'));
        Schema::dropIfExists(Config::get('amethyst.legal-entity.managers.legal-entity-contact.table'));
    }
}
