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
        Schema::create('ore_legal_entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country_iso')->nullable();

            foreach (Config::get('ore.legal-entity.attributes') as $name => $attribute) {
                $table->string($name)->nullable();
            }

            $table->integer('registered_office_address_id')->unsigned()->nullable();
            $table->foreign('registered_office_address_id')->references('id')->on(Config::get('ore.address.table'));

            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ore_legal_entities');
    }
}
