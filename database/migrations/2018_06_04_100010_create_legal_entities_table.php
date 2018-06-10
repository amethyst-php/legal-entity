<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateLegalEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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

            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ore_legal_entities');
    }
}
